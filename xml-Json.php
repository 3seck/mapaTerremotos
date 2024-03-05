<?php

function xmlToJson($xml) {
    $xmlElement = new SimpleXMLElement($xml);
    $xmlElement->registerXPathNamespace('dc', 'http://purl.org/dc/elements/1.1/');
    $xmlElement->registerXPathNamespace('geo', 'http://www.w3.org/2003/01/geo/wgs84_pos#');

    $data = array();
    $items = $xmlElement->xpath('//item');
    foreach ($items as $item) {
        $earthquake = array();
        $earthquake['title'] = (string)$item->title;
        $earthquake['description'] = (string)$item->description;
        $lat = $item->xpath('.//geo:lat');
        $long = $item->xpath('.//geo:long');
        $earthquake['geo'] = array(
            'lat' => $lat ? (string)$lat[0] : 'Valor no encontrado',
            'long' => $long ? (string)$long[0] : 'Valor no encontrado'
        );
        $data['item'][] = $earthquake;
    }
    return json_encode($data);
} 



$xml = <<<XML
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">
<channel>
<title>GeoRSS Sismología IGN</title>
<link>http://www.ign.es/ign/rss</link>
<description>
Este canal te permite consultar los terremotos ocurridos en España durante los últimos diez días. Esta información está sujeta a modificaciones como consecuencia de la continua revisión del análisis sísmico.
</description>
<language>es</language>
<dc:language>es</dc:language>
<item>
<title>-Info.terremoto: 27/02/2024 7:18:12</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024easso
</link>
<description>
Se ha producido un terremoto de magnitud 3.0 en SW CABO DE SAN VICENTE en la fecha 27/02/2024 7:18:12 en la siguiente localización: 36.6454,-11.1372
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024easso
</guid>
<geo:lat>36.6454</geo:lat>
<geo:long>-11.1372</geo:long>
</item>
<item>
<title>-Info.terremoto: 27/02/2024 6:45:22</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024earqj
</link>
<description>
Se ha producido un terremoto de magnitud 2.7 en ATLÁNTICO-CANARIAS en la fecha 27/02/2024 6:45:22 en la siguiente localización: 27.3019,-16.089
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024earqj
</guid>
<geo:lat>27.3019</geo:lat>
<geo:long>-16.089</geo:long>
</item>
<item>
<title>-Info.terremoto: 26/02/2024 22:06:17</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024eaanc
</link>
<description>
Se ha producido un terremoto de magnitud 3.5 en SW ES BÒRDES.L en la fecha 26/02/2024 22:06:17 en la siguiente localización: 42.6865,0.6962
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024eaanc
</guid>
<geo:lat>42.6865</geo:lat>
<geo:long>0.6962</geo:long>
</item>
<item>
<title>-Info.terremoto: 25/02/2024 21:15:59</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dydip
</link>
<description>
Se ha producido un terremoto de magnitud 3.3 en ATLÁNTICO-PORTUGAL en la fecha 25/02/2024 21:15:59 en la siguiente localización: 37.908,-9.5715
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dydip
</guid>
<geo:lat>37.908</geo:lat>
<geo:long>-9.5715</geo:long>
</item>
<item>
<title>-Info.terremoto: 25/02/2024 12:22:06</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dxlsp
</link>
<description>
Se ha producido un terremoto de magnitud 4.0 en AZORES-CABO DE SAN VICENTE en la fecha 25/02/2024 12:22:06 en la siguiente localización: 36.9959,-13.9396
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dxlsp
</guid>
<geo:lat>36.9959</geo:lat>
<geo:long>-13.9396</geo:long>
</item>
<item>
<title>-Info.terremoto: 25/02/2024 0:56:57</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dwpcx
</link>
<description>
Se ha producido un terremoto de magnitud 4.2 en AZORES-CABO DE SAN VICENTE en la fecha 25/02/2024 0:56:57 en la siguiente localización: 37.0162,-14.2722
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dwpcx
</guid>
<geo:lat>37.0162</geo:lat>
<geo:long>-14.2722</geo:long>
</item>
<item>
<title>-Info.terremoto: 25/02/2024 0:43:10</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dwoqz
</link>
<description>
Se ha producido un terremoto de magnitud 3.6 en AZORES-CABO DE SAN VICENTE en la fecha 25/02/2024 0:43:10 en la siguiente localización: 34.8585,-12.8673
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dwoqz
</guid>
<geo:lat>34.8585</geo:lat>
<geo:long>-12.8673</geo:long>
</item>
<item>
<title>-Info.terremoto: 24/02/2024 20:22:17</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dwgbe
</link>
<description>
Se ha producido un terremoto de magnitud 3.0 en E CERDIDO.C en la fecha 24/02/2024 20:22:17 en la siguiente localización: 43.6047,-7.9292
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dwgbe
</guid>
<geo:lat>43.6047</geo:lat>
<geo:long>-7.9292</geo:long>
</item>
<item>
<title>-Info.terremoto: 24/02/2024 19:37:07</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dweol
</link>
<description>
Se ha producido un terremoto de magnitud 3.8 en AZORES-CABO DE SAN VICENTE en la fecha 24/02/2024 19:37:07 en la siguiente localización: 37.0027,-14.069
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dweol
</guid>
<geo:lat>37.0027</geo:lat>
<geo:long>-14.069</geo:long>
</item>
<item>
<title>-Info.terremoto: 24/02/2024 7:13:30</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dvgan
</link>
<description>
Se ha producido un terremoto de magnitud 4.3 en SW CABO DE SAN VICENTE en la fecha 24/02/2024 7:13:30 en la siguiente localización: 36.6389,-11.1599
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dvgan
</guid>
<geo:lat>36.6389</geo:lat>
<geo:long>-11.1599</geo:long>
</item>
<item>
<title>-Info.terremoto: 23/02/2024 5:05:39</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dtghm
</link>
<description>
Se ha producido un terremoto de magnitud 3.3 en SW CABO DE SAN VICENTE en la fecha 23/02/2024 5:05:39 en la siguiente localización: 36.6184,-11.2905
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dtghm
</guid>
<geo:lat>36.6184</geo:lat>
<geo:long>-11.2905</geo:long>
</item>
<item>
<title>-Info.terremoto: 21/02/2024 19:57:34</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dqsry
</link>
<description>
Se ha producido un terremoto de magnitud 3.5 en ALBORÁN SUR en la fecha 21/02/2024 19:57:34 en la siguiente localización: 35.5927,-3.7572
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dqsry
</guid>
<geo:lat>35.5927</geo:lat>
<geo:long>-3.7572</geo:long>
</item>
<item>
<title>-Info.terremoto: 20/02/2024 10:22:37</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024doefj
</link>
<description>
Se ha producido un terremoto de magnitud 2.9 en SE MARSEILLE.FRA en la fecha 20/02/2024 10:22:37 en la siguiente localización: 42.9873,5.9905
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024doefj
</guid>
<geo:lat>42.9873</geo:lat>
<geo:long>5.9905</geo:long>
</item>
<item>
<title>-Info.terremoto: 20/02/2024 8:16:36</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024doabf
</link>
<description>
Se ha producido un terremoto de magnitud 2.8 en NW AIN TEMOUCHENT.ARG en la fecha 20/02/2024 8:16:36 en la siguiente localización: 35.5328,-1.2232
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024doabf
</guid>
<geo:lat>35.5328</geo:lat>
<geo:long>-1.2232</geo:long>
</item>
<item>
<title>-Info.terremoto: 19/02/2024 21:31:57</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dneuh
</link>
<description>
Se ha producido un terremoto de magnitud 3.0 en SW CABO DE SAN VICENTE en la fecha 19/02/2024 21:31:57 en la siguiente localización: 35.8637,-10.4537
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dneuh
</guid>
<geo:lat>35.8637</geo:lat>
<geo:long>-10.4537</geo:long>
</item>
<item>
<title>-Info.terremoto: 18/02/2024 18:16:29</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dlcvf
</link>
<description>
Se ha producido un terremoto de magnitud 3.3 en GOLFO DE CÁDIZ en la fecha 18/02/2024 18:16:29 en la siguiente localización: 36.6463,-8.3204
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dlcvf
</guid>
<geo:lat>36.6463</geo:lat>
<geo:long>-8.3204</geo:long>
</item>
<item>
<title>-Info.terremoto: 18/02/2024 8:26:42</title>
<link>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dkjjg
</link>
<description>
Se ha producido un terremoto de magnitud 4.2 en ATLÁNTICO en la fecha 18/02/2024 8:26:42 en la siguiente localización: 38.0718,-15.4085
</description>
<guid>
http://www.ign.es/web/ign/portal/sis-catalogo-terremotos/-/catalogo-terremotos/detailTerremoto?evid=es2024dkjjg
</guid>
<geo:lat>38.0718</geo:lat>
<geo:long>-15.4085</geo:long>
</item>
</channel>
</rss>
XML;


$json = xmlToJson($xml);
echo $json;

?>
