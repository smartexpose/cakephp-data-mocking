<?php /** @var \App\View\AppView $this */ ?>
<div class="col-md-8">
    <div class="page-header">
        <h1>Agent Taskboard</h1>
    </div>
    <?php foreach ($posts as $post): ?>
        <article>
            <h2><?= $post->name ?></h2>
            <p>
                <small>
                    Category : <?= $this->Html->link($post->category->name, ['controller' => 'Posts', 'action' => 'category', 'slug' => $post->category->slug]) ?>,
                    by <?= $this->Html->link($post->user->username, ['controller' => 'Posts', 'action' => 'author', 'id' => $post->user->id]) ?> on <em><?= $post->created->format('F jS Y, H:i') ?></em>
                </small>
            </p>
            <p><?= $this->Markdown->parse($this->Text->truncate($post->content, 450, ['ellipsis' => '...', 'exact' => false])) ?></p>
        </article>
        <hr>
    <?php endforeach; ?>

    <?php if ($this->Paginator->counter() !== '1 of 1'): ?>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('«') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('»') ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
