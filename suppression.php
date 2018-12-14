<?php
function supprime($bdd)
{
$crache = $bdd->prepare('DELETE posts FROM (thumbnail, title, content, published')
VALUES(:thumbnail,:title,:content,:published));
        $crache->execute([
            'thumbail'=>$thumbail,
            'title'=>$title,
            'content'=>$content,
            'published'=>$published,
        ]);
}


?>
