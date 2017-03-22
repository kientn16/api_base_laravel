@extends('web.layouts.main')
@section('content')
    <div class="list-skill">
        <ul class="list-part">
            <li>
                <h2>Introduction</h2>
                <p>
                    中分類の解説表示領域です。テキスト・数式・画像をパラメータで制御します。（英語ではテキストのみ）テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキス
                </p>
            </li>
            <li>
                <h2>オススメ取組み</h2>
                <p>
                    小分類のオススメを表示します。アテンション表示と連動します。小分類ステータス パラメータで制御（trainingかbrushupかのみの指定）おすすめ最大数：１
                </p>
            </li>
        </ul>
    </div>
    <div class="align-center skill-btn">
        <a href="#" class="training-btn">A2-2の課題に取り組む</a>
    </div>
@endsection