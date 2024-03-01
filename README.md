# fam-project

最終更新:2024/01/04

--------------------------------------初めに-----------------------------------
	READMEを読んでわからないことがあればすぐに聞いてください
	わからないまま進めると大変なことになります
	コードに関することは私、デザイン・機能に関することはディレクター
	当事者意識持ち、最後までやりきってきください

	最初にカンプをじっくり見て考察することをお勧めします
	各セクションのタイトル部分はスタイルが同じだからクラスまとめられるな〜とか
	同じようなコンテンツが並んでいたら複製して中身だけかえればいいか〜など、、、
	どこをどう作るかをある程度頭で描いて、忘れちゃうならメモってから作り始めた方が
	予定も立てやすいし、自分が何ができるのか、できないのかが浮き彫りになるので焦りも減ってくるかと思います。


●管理
	クローンができたら自分のブランチを作成してください
	(ローマ字でフルネーム-project)
	そこでコード管理を行います
	制作物が完成したら必ずご自身のPCにバックアップを作成してください（zip等で保存）


●ファイル構成
	SASSを使用しない場合、sassフォルダとstyle.css.mapは消してください。その際にreset.cssはsass内に入っています。
	templateはコピペなりなんなりして使ってください
	templateファイル名は実装する案件によって名前変えてください(全角以外で)
	管理がしにくくなるので不要なフォルダ、ファイルは消してください
	CSSはstyle.cssとreset.cssのみにしてください
	style.cssには@charset "UTF-8";を必ず記述してください	

	SASSを使用したい場合は私に相談してください

	初めは↓のようになっているかと思いますが
	<link rel="stylesheet" href="css/style.css">
	を
	<link rel="stylesheet" href="css/style.css?date=<?=date('YmdGis', filemtime( 'css/style.css' ));?>">
	に変更してください
	CSSの読み込みは上記のようにしてください（reset.cssも同様）
	↑にすることでサーバーにアップした際にキャッシュを自動で更新するようにしています


●ディレクトリルール
template（雛形）
	｜
	｜index.html（場合によっては名前を変えて増やす）
	｜
	｜sitemap.xml
	｜
	｜robot.txt
	｜
	｜img -{ favicon }
	｜
	｜js - { script.js , cooperatorScript.js }
	｜
	｜sass - {共同制作の場合cooperatorを編集してください。詳しくは雛形内のREADMEを見てください}
	｜
	｜css - { style.css}
	
	基本はこのような構成にしてください
	index.htmlは必ず必要です
	imgには画像を入れてください
	ディレクトリを分けずに全ての画像ファイルをimgにいれてください
	ファビコン画像のみfaviconフォルダに入れてください
	cooperatorと付いているものは共同制作の場合メインとなる人物以外が使用してください
	

●メールフォームルール（重要）
	🚨必ずメールが送れるようにしてください
	🚨送信先、送信者にメールが届くか、ご自身のアドレスを入れ込みテストしてください
	🚨できていないまま提出すると大勢の人に迷惑がかかります

	🚨確認画面が必要な場合は確認画面も作成してください
	🚨バリデーションは必ず行ってください
	🚨確認画面から戻るボタンを押した際に入力した内容が消えないようにしてください
	🚨再度入力しても記入事項が更新されるようにしてください
	🚨完了ページも作成してください

	🚨メールフォームを作成する場合はindex.phpにするか、phpファイルを新たに作成してください
	🚨phpで作成するとhtmlのようには見れなくなります。提出する際はディレクター、お客様が見れるようにするので、ディレクターに説明し、私にも連絡してくださいテストサーバーにアップします

	🚨メール内容はディレクターに確認してくだい

	🚨誰も手伝ってはくれません、責任持って作成してください


●コーディング
	提出前に必ず自らレイアウトの崩れがないか、レスポンシブ対応ができているか、確認してください
	実際にウィンドを動かして1つ1つ確かめてください
	全体をPC,SPそれぞれ３回はチェックしてください
	スマホ、パソコンそれぞれでGoogle Chrome、Safariの検証をご自身で行ってください
	↑スマホでの検証方法は調べてもわからない場合は聞いてください
	検証機能を使って画面幅約2200px〜320pxまで確認してください
	レイアウトが崩れた状態で提出はしないでください

・PC、SPのメディアクエリ両方を使用

		.text{
			background-color: green;
		}
		↑共通のスタイルを記述

	  @media screen and (min-width: 768px){
			.text{
				color: red;
			}
		}
		↑PC時のスタイルを記述

		@media screen and (max-width: 767px){
			.text{
				color: blue;
			}
		}
		↑SP時のスタイルを記述


		途中でスタイルを変更したい場合は
	@media screen and (max-width: 1000px) and (min-width: 767px){}
	を使用してみてください
	↑は1000px〜767pxの間でのみ適用されます
	1000pxの数値を変えれば適用される画面幅を変更できます


・ファーストビュー
	PC
		レイアウトによりますので、ディレクターに確認してください（縦幅）
	SP
		レイアウトによりますが、縦幅650px〜700pxくらいで作成してください
		指示がディレクターからあると思いますが、ない場合は連絡して確認してください

・画像
	同じ画像は使い回すこと(有料画像の関係上同じ画像の場合は別で)
	カンプによってはデザイン外に画像が出ている場合がありますが、その場合はデザイン外の画像を使用して、自分で画像の装飾をしてください（素の画像にプロパティをつける）
	↑これをすることにより画像を本場用に差し替えてもレイアウトが崩れる可能性を減らすことができます

	画像は必ずimgフォルダに入れてください
	img内のディレクトリは作らないでください

	画像ファイル名は半角英語で統一してください
	数字から始まらせないでください
	スペースは使用しないでください
	全角は絶対に使用しないでください
	読み込まない恐れがあります

	png, jpg,svgを使い分けてください

	ファイルサイズはできるだけ小さくしてください
	

・display:flexについて
	例えば一段目左から画像・文章、二段目左から文章・画像というようなレイアウトの場合は
	display:flexだと逆並びができます
	調べてみてください
	これを使用することによりほとんどhtmlを変えずにSP画面では縦１列で画像・文章・画像・文章というように並べ替えることができます


・途中で要素が増減する可能性を考えてください
	例えば文章部分の場合は初め『テキストテキストテキストテキストテキストテキスト』で入っているかと思いますが、本番用の文章が入るとほぼほぼ文字数は増えます。
	その際に高さを指定していると確実にはみ出ます。
	ご自身で文字数を増やして確認してください
	崩れたまま提出しないでください


・フォントファミリーについて
	どのブラウザでも反映されるようにしてください。
	グーグルフォトを使用するといいです
	使用する場合はhtmlのhead内の<!-- ▼フォント -->の直下に記述してください

・px表記は↓に直す	(リキッドレイアウトの指示があった場合。ない場合は指示を煽ってください)
	pxをvwに自動で計算してくれるcalcを使用を使用します

	カンプの画面サイズが1280pxの場合
		calc(( ○○/ 1280 ) * 100vw)

	カンプの画面サイズが390pxの場合
		calc(( ○○/ 390 ) * 100vw)	

	SPの場合は
	max(calc(( ○○/ 390 ) * 100vw),△△px)
	を使用せず
	calc(( ○○/ 390 ) * 100vw)	
	だけでOKです
	SPは基本的には最小値を指定する必要がないためです

※ただしフォントサイズ、行間、文字幅は基本	max(calc(( ○○/ 1280 ) * 100vw),△△px)を使うこと
	例えばフォントサイズが２０pxだった場合
	font-size: max(calc(( 20/ 1280 ) * 100vw), 12px);
	こうすると最小値が12pxになり、それ以上は画面幅により変化します
	最小値はディレクターに確認してください

	SPの場合は
	max(calc(( ○○/ 390 ) * 100vw),△△px)
	を使用せず
	calc(( ○○/ 390 ) * 100vw)	
	だけでOKです
	SPは基本的には最小値を指定する必要がないためです

	文字のサイズによりレイアウトを変えたい場合はディレクターに必ず連絡してください
	https://takoyaki-yamachan.co.jp/
	参考サイトです
	ビールアソートセットの部分を見てください
	途中で写真とテキストエリアを変えています
    @media screen and (max-width: 1000px) and (min-width: 767px){}
	を使うと1000px〜767pxの間でのみ適用されます
	また↓を使うと1000px〜767px以外で適用されます
		@media not screen and (max-width: 1000px) and (min-width: 767px) {}


	文字サイズは非常に大切な設定です。
	認識が合っているかどうか私に確認してください
	
・文章
	文章に関してはすでにカンプに埋め込まれている場合、改行の位置を考えてください
	綺麗に両サイドが揃うようにしてください


・position使用の注意点
	position:relative、absoluteは画面幅を縮小拡大させた時、要素が途中で増えた時レイアウトが崩れるのであれば使用しない
	しっかり理解した上で使用してください
	理解しないまま使用すると必ずレイアウトが崩れます
	上記で述べた文章部分の増減でもpositionを使用するとレイアウトが崩れます
	できなければ相談してください


・上下左右フェードインはフォーマットを作るのでクラスをつけるのみで対応可能にする
	※チーム作成の場合


・インデント
	インデントは整理してから提出してください

・コメントアウト
	コメントアウトを使用して誰がみても理解できるコードにしてください
	特にjsには必ず入れてください

・基本アニメーションが全てに入ると仮定してコーディングすること

・迷ったらすぐに確認してくだい

・不可能な箇所が出てきたら即相談

・ヘッダーフッターその他の共通は共通化したものを使用
	※HPチーム作成の場合
	
・CSSコメントアウトを使用して自分の担当箇所を明記
	※HPチーム作成の場合




●クラス名

・クラス名命名
	class=“セクション--コンテンツ--種類(img/text/title…)”

・外側を囲むもの（各セクション）
	class=“セクション--wrapper”

・外側を囲むものの一つ内側がほしいとき
	class=“セクション--inner”

・共通のクラスの場合(ex.ヘッダー、フッター、FVタイトル、、、)
	class=“コンテンツ--種類(img/text/title…)”

・PC,SPそれぞれで不要な要素を非表示
	@media screen and (min-width: 768px) {
		.sp {
			display: none;
		}
	}

	@media screen and (max-width: 767px) {
		.pc {
			display: none;
		}
	}


headタグ内について
	metaタグ、ファビコンはジェネレーターを用意しているのでそちらを使用してください
	使用方法はジェネレーターに書いてあります
	画像へのパスをしっかり書いてください
	SEO対策に重要なタグになりますのでわからなければ聞いてください
	本番URLが決まっていない場合は『URL』と入れてください



※その他の注意点

英語で付ける
	class名は半角英数字で英語で付けるようにしましょう。日本語をローマ字に置き換えるのはNGです。
	◯center　☓chuo

数字から始まるのはダメ
	class名は数字から始まってはいけません。必ずアルファベットで始めるようにしましょう。
	◯text01　☓01text

複数の単語を組み合わせる場合はハイフンかアンダースコア

複数の単語を組み合わせるときはハイフンまたはアンダースコアでつなぎます。他の単語でつないだり、半角スペースを空けるのはNGです。特に半角スペースを空けた場合、2つの別々のclassとして認識されます。
	◯section-title、section_title　☓section title、section.title


--------------------------------------最後に--------------------------------------
	◎製作中煮詰まった時
		一番は落ち着くこと（焦ってむちゃくちゃなコードで完成させてもあとで自分でも理解できなくなる）
		相談してみる、調べる、聞く（誰かに相談することにより解決する可能性も無きにしも非ず）（調べるワードを変えてみたりとかでも意外とヒットしたりもする）
		飛ばして先をやる（とまってても時間が勿体無い）
		一旦コードを消しちゃうのもあり（作り方を変えてみたりする、無理やり形だけ合わせても後でどうせ直す）

	◎考え方
	・例えば300×200の要素を上下中央に配置したい時、いろんな方法があります。marginつかったり、親にflexとjustify-content: center;align-items: center;を使ったり
	親と合わせてpositionを使ったり（あんまり使用しない方がいい）、などなど方法はあります。その中で最適な方法で配置したりしていく感じ



	予定より遅れそうな場合はすぐにディレクターに連絡してください！！！絶対これは守ってください！！！



	納期は短いですが、できるだけ丁寧にコーディングしていきましょう🤙
	わからないことがあればすぐに相談してください🌱

	以上🏝️


	ここまで読んだら私に何を理解したか、理解できなかったか、疑問点などを必ず連絡してください！！！
	認識がずれたまま進めてしまうと後で苦しむのは自分自身です！！！