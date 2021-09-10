<h1><?= h($article->title) ?></h1>
<p>Category: <?= ($article->category->name ) ?></p>

<p>Body: <br><?= h($article->body) ?></p><br><br>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
