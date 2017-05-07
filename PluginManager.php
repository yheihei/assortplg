<?php

namespace Plugin\AssortContent;

use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\Filesystem\Filesystem;

class PluginManager extends AbstractPluginManager
{

    /**
     * @var string コピー元リソースディレクトリ
     */
    private $origin;

    /**
     * @var string コピー先リソースディレクトリ
     */
    private $target;

    public function __construct()
    {
        // コピー元のassetsディレクトリ
        $this->origin = __DIR__.'/Resource/assets';
        // コピー先のassetsディレクトリ
        $this->target = '/AssortContent';
    }
    
    /**
     * リソースファイル等をコピー
     *
     * @param Application $app
     */
    private function copyAssets(Application $app)
    {
        $file = new Filesystem();
        $file->mirror($this->origin, $app['config']['plugin_html_realdir'].$this->target.'/assets');
    }

    /**
     * コピーしたリソースファイルなどを削除
     *
     * @param Application $app
     */
    private function removeAssets(Application $app)
    {
        $file = new Filesystem();
        $file->remove($app['config']['plugin_html_realdir'].$this->target);
    }

    // インストール時にマイグレーションの「up」メソッドを実行します
    public function install($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code']);
        // リソースファイルのコピー
        $this->copyAssets($app);
    }

    // アンインストール時にマイグレーションの「down」メソッドを実行します
    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Migration', $config['code'], 0);
        // リソースファイルの削除
        $this->removeAssets($app);
    }

    // プラグイン有効時に、指定の処理 (ファイルのコピーなど) を実行できます。
    public function enable($config, $app)
    {
        
    }

    // プラグイン無効時に、指定の処理 ( ファイルの削除など ) を実行できます。
    public function disable($config, $app)
    {

    }

    // プラグインアップデート時に、指定の処理を実行できます。(今回はなし)
    public function update($config, $app)
    {
        // リソースファイルのコピー
        $this->copyAssets($app);
    }
}