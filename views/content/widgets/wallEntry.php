<?php

$paramKeyword = isset($_GET['keyword'])?$_GET['keyword']:"";
if(!empty($paramKeyword)) {
    echo $this->render("entrySearch", [
        'object' => $object,
        'wallEntryWidget' => $wallEntryWidget,
        'content' => $content,
    ]);
} else {
    echo $this->render("entry", [
        'object' => $object,
        'wallEntryWidget' => $wallEntryWidget,
        'content' => $content,
    ]);
}
