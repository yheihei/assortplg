<?php

namespace Plugin\AssortContent;

use Eccube\Plugin\AbstractPluginManager;

class PluginManager extends AbstractPluginManager
{

    // インストール時にマイグレーションの「up」メソッドを実行します
    public function install($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code']);
    }

    // アンインストール時にマイグレーションの「down」メソッドを実行します
    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code'], 0);
    }

    // プラグイン有効時に、指定の処理 (ファイルのコピーなど) を実行できます。(今回はなし)
    public function enable($config, $app)
    {

    }

    // プラグイン無効時に、指定の処理 ( ファイルの削除など ) を実行できます。(今回はなし)
    public function disable($config, $app)
    {

    }

    // プラグインアップデート時に、指定の処理を実行できます。(今回はなし)
    public function update($config, $app)
    {

    }
}