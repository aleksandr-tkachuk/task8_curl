<?php

class Quest {

    private $content;

    public function serch($query) {
        $сaption = [
            'accept-language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
            'content-type:text/html;charset=UTF-8',
            'user-agent:Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36'
        ];
        $findTo = 'https://www.google.com.ua/' . $query;

        $curl = curl_init($findTo);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $сaption);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $this->content = curl_exec($curl);

        if ($this->content === false) {
            throw new Exception("no content");
        }
    }

    public function handler() {
        $query = str_replace(" ", '+', $_POST['curl']);
        return 'search?q=' . $query;
    }

    public function analysis() {
        $query = new DOMDocument();
        $this->content;
        @$query->loadHTML($this->content);

        $select = new DomXPath($query);
        $joins = $select->query("//*[contains(@class, 'rc')]");
        $info = [];

        foreach ($joins as $join) {
            if ($join->firstChild && $join->firstChild->firstChild && $join->firstChild->firstChild->getAttribute('href')) {
                $info[] = ['name' => @$join->firstChild->firstChild->nodeValue,
                            'link' => @$join->firstChild->firstChild->getAttribute('href'),
                            'shortText' => @$join->getElementsByTagName('span')->item(1)->nodeValue];
            }
        }
        return $info;
    }

}
