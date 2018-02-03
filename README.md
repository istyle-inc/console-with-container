# Writing beautiful command line applications Using The Symfony\Console Component with PSR-11 Container 
  
*Container(PSR-11) と Symfony\Console で簡単なコマンドラインアプリケーションを作ってみよう* エントリで紹介したサンプルコードリポジトリです

## Started

```bash
$ composer install
```

## Command

```bash
$ php console sample:process
```

consoleファイルで利用するDependency Inject Containerを変更してみましょう。

```php
/**
 * zend  / aura / league / illuminate
 * 4つのコンテナを入れ替えることができます
 */
$container = $factory->build('zend');
$application->addCommands([
    $container->get(\ConsoleApp\Commands\SampleExecuteCommand::class),
]);

$application->run();
```

PSR-11準拠のコンテナライブラリを使って、getメソッドを通じてインスタンス生成が行われますが、  
インスタンス生成方法について、それぞれのライブラリの違いを学ぶことができます。
  
好みのライブラリを利用して、簡単なフレームワークや、
テスタブルなアプリケーション作りを！
