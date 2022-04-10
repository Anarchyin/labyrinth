<?php
class init
{
    function get_html(){

        $curs = $this->get_currency();
        $weather = $this->weather();

        $html='';
        $html .=
            '<div class="space">
                    <p> '.$weather['city'].', '.$weather['weather'].'.</p>
                    <p>'.str_replace("-",".", substr($weather['lastupdate'],5,-9)).'</p>
                    <p>Температура: '.$weather['temperature'].'<sup> o</sup></p>
                    <p>Чувствуется как: '.$weather['feels_like'].'<sup> o</sup></p>
                    
            
            </div>     
        ';
        foreach($curs as $code => $item){
            $html .=
                    '<div class="space">
                        <p>'.$item['Nominal'].' '.$code.' = '.$item['Value'].' RUB</p> 
                        <p>'.$item['Name'].'</p>
                    </div>
                    ';

        }
        return $html;
    }


    function get_currency(){
        $url = "http://www.cbr.ru/scripts/XML_daily.asp";
        $curs = array();


        if(!$xml=simplexml_load_file($url)) die('Ошибка загрузки XML');

        foreach($xml->Valute as $m){
            if($m->CharCode=="USD" || $m->CharCode=="EUR" || $m->CharCode=="CAD" || $m->CharCode=="SEK" || $m->CharCode=="JPY"){
                $curs[(string)$m->CharCode] = ['Name' => (string)$m->Name, 'Nominal' => (int)$m->Nominal, 'Value' => (float)$m->Value];
            }
        }

        return $curs;
    }


    function weather(){
        $API_key = "631c17230128ae42a429eb5533fb6b0e";
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=55.7504461&lon=37.6174943&units=metric&appid=".$API_key."&lang=ru&mode=xml";
        $weather = array();

        if(!$xml=simplexml_load_file($url)) die('Ошибка загрузки XML');


        foreach($xml as $tag) {
            //  echo "<pre>" ;print_r($tag->getName()); echo "</pre>";
            if ($tag->getName() == "city"){
                foreach($tag->attributes() as $a => $b) {
                    if($a == 'name'){
                        $weather['city'] = (string)$b;
                    }
                }
            }
            if ($tag->getName() == "temperature") {
                foreach ($tag->attributes() as $a => $b) {
                    if($a == 'value') {
                        $weather['temperature'] = (float)$b;
                    }
                }
            }
            if ($tag->getName() == "feels_like"){
                foreach($tag->attributes() as $a => $b) {
                    if($a == 'value'){
                        $weather['feels_like'] = (float)$b;
                    }
                }
            }
            if ($tag->getName() == "weather"){
                foreach($tag->attributes() as $a => $b) {
                    if($a == 'value')
                        $weather['weather'] = (string)$b;
                }
            }
            if ($tag->getName() == "lastupdate"){
                foreach($tag->attributes() as $a => $b) {
                    if ($a == 'value') {
                        $weather['lastupdate'] = (string)$b;
                    }
                }
            }

            foreach($tag as $subTag){
                //  echo "<pre>" ;print_r($subTag->getName()); echo "</pre>";
            }
        }


        return $weather;


    }
}
