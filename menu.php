<?php

// pegando a página atual para destacar o menu
$uri = $_SERVER['REQUEST_URI'];
$page = explode('/', $uri);
$page = end($page);

$menu = [
    'Dashboard' => [
        'icon' => 'fa fa-home',
        'link' => 'index.php'
    ],
    'Cadastro' => [
        'icon' => 'fa fa-file-text',
        'items' => [
            'Cliente' => '#',
            'Fornecedor' => '#',
            'Usuário' => '#',
            'Produtos' => '#',
            'Perfil de acesso' => '#'
        ]
    ],
    'Relatório' => [
        'icon' => 'fa fa-bar-chart-o',
        'items' => [
            'Cliente' => '#',
            'Faturamento' => '#',
            'Produtos' => '#',
        ]
    ]
];

?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <div class="form-container">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..." />
                            <input type="button" class="submit" value=" " />
                        </div>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <?php foreach ($menu as $title => $item) : ?>
                <?php if (!empty($item['link'])) : ?>
                    <li class="<?= strstr($page, $item['link']) ? 'start active' : '' ?>">
                        <a href="<?= $item['link'] ?>">
                            <i class="<?= $item['icon'] ?>"></i>
                            <span class="title">
                                <?= $title ?>
                            </span>
                            <span class="selected"></span>
                        </a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="javascript:;">
                            <i class="<?= $item['icon'] ?>"></i>
                            <span class="title">
                                <?= $title ?>
                            </span>
                            <span class="arrow"></span>
                        </a>
                        <?php if (!empty($item['items'])) : ?>
                            <?php ksort($item['items']) ?>
                            <ul class="sub-menu">
                                <?php foreach ($item['items'] as $page_name => $page_link) : ?>
                                    <li>
                                        <a href="<?= $page_link ?>"><?= $page_name ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endif ?>
            <?php endforeach ?>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>