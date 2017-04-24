<?php
namespace Plugin\AssortContent;

use Eccube\Event\EventArgs;
use Eccube\Application;
use Eccube\Common\Constant;
use Eccube\Entity\Product;
use Eccube\Event\TemplateEvent;
use Plugin\AssortContent\Entity\AssortContent;
use Plugin\AssortContent\Entity\AssortProductContent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class Assort
{
    public $name;
    public $image;
}

class AssortContentEvent
{
    
    /**
     * プラグインが追加するフォーム名
     */
     
    const ASSORT_CONTENT_PREFIX = 'plg_assort_';
    const ASSORT_COUNT = 6;
    
    const ASSORT_CONTENT_AREA_NAME1 = 'plg_assort_name1';
    const ASSORT_IMAGE_AREA_NAME1 = 'plg_assort_image1';
    
    const ASSORT_CONTENT_AREA_NAME2 = 'plg_assort_name2';
    const ASSORT_IMAGE_AREA_NAME2 = 'plg_assort_image2';
    
    const ASSORT_CONTENT_AREA_NAME3 = 'plg_assort_name3';
    const ASSORT_IMAGE_AREA_NAME3 = 'plg_assort_image3';
    
    const ASSORT_CONTENT_AREA_NAME4 = 'plg_assort_name4';
    const ASSORT_IMAGE_AREA_NAME4 = 'plg_assort_image4';
    
    const ASSORT_CONTENT_AREA_NAME5 = 'plg_assort_name5';
    const ASSORT_IMAGE_AREA_NAME5 = 'plg_assort_image5';
    
    const ASSORT_CONTENT_AREA_NAME6 = 'plg_assort_name6';
    const ASSORT_IMAGE_AREA_NAME6 = 'plg_assort_image6';
    
    /** @var \Eccube\Application $app */
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function onAdminProductInit(EventArgs $event)
    {
        log_info('アソートレイアウト！');
        /** @var Product $Product */
        $Product = $event->getArgument('Product');
        //dump($event);
        $id = $Product->getId();
        //dump($id);
        
        $AssortContent = null;
        $AssortProductContents = null;

        // IDの有無で登録か編集かを判断
        if ($id) {
            // 商品編集時はその商品IDにひもつくアソートIDの初期値を取得
            $AssortProductContents = $this->app['assort_content.repository.assort_product_content']
                ->findBy(array('product_id' => $id));
            //dump($AssortProductContents);
            if(!empty($AssortProductContents[0])) {
                //$AssortContent = $AssortProductContents[0]->getAssortContent();
                $AssortContents = $this->app['assort_content.repository.assort_content']
                ->findBy(array('assort_id' => $AssortProductContents[0]->getAssortId()));
                if(!empty($AssortContents[0])) {
                    $AssortContent = $AssortContents[0];
                }
                //dump($AssortContent);
            }
        }

         // 商品新規登録またはアソートが未登録の場合
        if (is_null($AssortContent)) {
            $AssortContent = new AssortContent();
        }

        // フォームの追加
        /** @var FormInterface $builder */
        // FormBuildeの取得
        $builder = $event->getArgument('builder');
        // 項目の追加
        $builder
        ->add(
            self::ASSORT_CONTENT_AREA_NAME1,
            'text',
            array(
                'label' => 'アソート名1',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME1,
            'file',
            array(
                'label' => 'アソート画像1',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME2,
            'text',
            array(
                'label' => 'アソート名2',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME2,
            'file',
            array(
                'label' => 'アソート画像2',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME3,
            'text',
            array(
                'label' => 'アソート名3',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME3,
            'file',
            array(
                'label' => 'アソート画像3',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME4,
            'text',
            array(
                'label' => 'アソート名4',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME4,
            'file',
            array(
                'label' => 'アソート画像4',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME5,
            'text',
            array(
                'label' => 'アソート名5',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME5,
            'file',
            array(
                'label' => 'アソート画像5',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ->add(
            self::ASSORT_CONTENT_AREA_NAME6,
            'text',
            array(
                'label' => 'アソート名6',
                'required' => false,
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'アソートの名前',
                ),
            )
        )
        ->add(
            self::ASSORT_IMAGE_AREA_NAME6,
            'file',
            array(
                'label' => 'アソート画像6',
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            )
        )
        ;

        // 初期値を設定
        //dump($builder);
        $builder->get(self::ASSORT_CONTENT_AREA_NAME1)->setData($AssortContent->getName());
        $builder->get(self::ASSORT_IMAGE_AREA_NAME1)->setData($AssortContent->getImageFileName());
    }
    
    /**
     * 管理画面：商品登録画面で、登録処理を行う.
     *
     * @param EventArgs $event
     */
    public function onAdminProductEditComplete(EventArgs $event)
    {
        /** @var Application $app */
        $app = $this->app;
        /** @var Category $target_category */
        //$TargetCategory = $event->getArgument('TargetCategory');
        $Product = $event->getArgument('Product');
        /** @var FormInterface $form */
        $form = $event->getArgument('form');
        //dump($form);
        //dump($form[self::ASSORT_CONTENT_AREA_NAME1]);
        //dump($form[self::ASSORT_IMAGE_AREA_NAME1]);
        
        // 商品IDが渡ってこない場合何もせず終了
        $id = $Product->getId();
        if(is_null($id)) {
            log_info('product_id is nothing. exit.');
            return;
        }
        
        $images = null;
        $update_assorts;
        for($i = 1; $i < self::ASSORT_COUNT + 1; $i++) {
            $assort = new Assort();
            $assort->name = $form[self::ASSORT_CONTENT_PREFIX . 'name' . $i]->getData();
            if($assort->name === null) continue;
            $assort->image = $form[self::ASSORT_CONTENT_PREFIX . 'image' . $i]->getData();
            //dump($assort);
            $update_assorts[] = $assort;
            //$images[$i] = $form[self::ASSORT_CONTENT_PREFIX . 'image' . $i]->getData();
        }
        //dump($images);
        //dump($update_assorts);
        
        foreach($update_assorts as $a){
            //ファイルフォーマット検証
            if(empty($a->image)) continue; //画像登録がなければスキップ
            $mimeType = $a->image[0]->getMimeType();
            if (0 !== strpos($mimeType, 'image')) {
                throw new UnsupportedMediaTypeHttpException('ファイル形式が不正です');
            }
            $orgname = $a->image[0]->getClientOriginalName();
            $filename = date('mdHis') . '_' . $orgname;
            $a->image[0]->move($app['config']['image_save_realdir'], $filename);
            //dump('uploaded! '. $filename);
        }
        
        $AssortContent = null;
        $AssortProductContent = null;
        
        $AssortProductContents = $this->app['assort_content.repository.assort_product_content']
                ->findBy(array('product_id' => $id));
                
        //dump($AssortProductContents);
        
        //if(!empty($AssortProductContents[0])) {
        $AssortContents;
        for ($i = 0; $i < count($AssortProductContents); $i++) {
            $AssortContents[] = $AssortProductContents[$i]->getAssortContent();
        }
        //dump($AssortContents);
        
        $currentCount = count($AssortContents);
        for($i = 0; $i < count($update_assorts); $i++) {
            if (count($currentCount) > $i) {
                $imgFileName = null;
                if(!empty($update_assorts[$i]->image)) {
                    $imgFileName = $update_assorts[$i]->image[0]->getClientOriginalName();
                }
                $AssortContents[$i]->setName($update_assorts[$i]->name);
                $AssortContents[$i]->setImageFileName($imgFileName);
                // DB更新
                $app['orm.em']->persist($AssortContents[$i]);
                $app['orm.em']->flush($AssortContents[$i]);
                
                //dump($AssortContents[$i]);
                
                $AssortProductContents[$i]
                    ->setAssortContent($AssortContents[$i])
                    ->setAssortId($AssortContents[$i]->getId())
                    ->setProduct($Product)
                    ->setProductId($Product->getId());
                    
                //dump($AssortProductContent);
                // DB更新
                $app['orm.em']->persist($AssortProductContents[$i]);
                $app['orm.em']->flush($AssortProductContents[$i]);
            } else {
                //新規アソートの場合追加
                //dump($update_assorts[$i]);
                $imgFileName = null;
                if(!empty($update_assorts[$i]->image)) {
                    $imgFileName = $update_assorts[$i]->image[0]->getClientOriginalName();
                }
                $AssortContents[] = new AssortContent(
                        $update_assorts[$i]->name,
                        $imgFileName
                    );
                // DB更新
                $app['orm.em']->persist($AssortContents[$i]);
                $app['orm.em']->flush($AssortContents[$i]);
                
                //dump($AssortContents[$i]);
                
                $AssortProductContents[] = new AssortProductContent(
                        $AssortContents[$i],
                        $AssortContents[$i]->getId(),
                        $Product,
                        $Product->getId()
                    );
                //dump($AssortProductContents[$i]);
                // DB更新
                $app['orm.em']->persist($AssortProductContents[$i]);
                $app['orm.em']->flush($AssortProductContents[$i]);
            }
        }

    }
    
    /**
     * 商品画面にアソート画像を表示する.
     *
     * @param TemplateEvent $event
     */
    public function onRenderProductDetail(TemplateEvent $event)
    {
        //dump('商品画面レイアウト!twig表示！');
        $parameters = $event->getParameters();
        
        //dump($parameters);
        $Product = $parameters["Product"];
        //dump($Product);
        
        $id = $Product->getId();
        //dump($id);
        
        $AssortContent = null;
        $AssortContents = null;
        $AssortProductContents = null;

        // IDの有無を念のためチェック
        if ($id) {
            // 商品表示時はその商品IDにひもつくアソートIDの値を取得
            $AssortProductContents = $this->app['assort_content.repository.assort_product_content']
                ->findBy(array('product_id' => $id));
            //dump($AssortProductContents);
            if(!empty($AssortProductContents[0])) {
                //$AssortContent = $AssortProductContents[0]->getAssortContent();
                $AssortContents = $this->app['assort_content.repository.assort_content']
                ->findBy(array('assort_id' => $AssortProductContents[0]->getAssortId()));
                
                dump($AssortContents);
                
                if(!empty($AssortContents[0])) {
                    $AssortContent = $AssortContents[0];
                }
                //dump($AssortContent);
            }
        }

         // アソートが未登録の場合 アソートのデータを追加せずreturn
        if (is_null($AssortContents)) {
            return;
        }
        
        // twigコードにアソートコンテンツを挿入
        $snipet = null;
        foreach ($AssortContents as $AssortContent) {
            dump($AssortContent->getImageFileName());
            $snipet .= '<div class="hoge">
            <img src="{{ app.config.image_save_urlpath }}/'. $AssortContent->getImageFileName() . '"/>
            </div>';
        }
        //$snipet = '<div class="hoge">
        //    <img src="{{ app.config.image_save_urlpath }}/{{ AssortContent.image_file_name | raw}}"/>
        //    </div>';
        $search = '<div id="product_tag_box" class="product_tag">';
        $replace = $snipet.$search;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);
        
        // twigパラメータにアソートコンテンツを追加
        $parameters['AssortContent'] = $AssortContent;
        $event->setParameters($parameters);
        
        return;
        
        
        
        
        
        // カテゴリIDがない場合、レンダリングしない
        if (is_null($parameters['Category'])) {
            return;
        }

        // 登録がない、もしくは空で登録されている場合、レンダリングをしない
        $Category = $parameters['Category'];
        $CategoryContent = $this->app['category_content.repository.category_content']
            ->find($Category->getId());
        if (is_null($CategoryContent) || $CategoryContent->getContent() == '') {
            return;
        }

        // twigコードにカテゴリコンテンツを挿入
        $snipet = '<div class="row">{{ CategoryContent.content | raw }}</div>';
        $search = '<div id="result_info_box"';
        $replace = $snipet.$search;
        $source = str_replace($search, $replace, $event->getSource());
        $event->setSource($source);

        // twigパラメータにカテゴリコンテンツを追加
        $parameters['CategoryContent'] = $CategoryContent;
        $event->setParameters($parameters);
    }
}