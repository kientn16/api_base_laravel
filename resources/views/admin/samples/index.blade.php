@extends('admin.layouts.main')
@section('title')コンテンツ管理
@endsection
@section('content')
<main class="main inner">
    <ul class="btn-list">
        <li>
            <a class="btn modal-trigger" href="#sign-up">新規登録</a>
        </li>
        <li>
            <a class="btn modal-trigger" href="#csv-import">CSVインポート</a>
        </li>
        <li>
            <a class="btn modal-trigger" href="#csv-export">CSVエクスポート</a>
        </li>
    </ul>
    <header class="elastic__header">
        <button type="button" class="elastic__trigger">検索条件を変更する</button>
        <div class="conditions elastic__accordion">
            <p class="conditions__heading">
                <svg viewBox="0 0 512 512">
                    <g>
                        <path d="M495.272,423.558c0,0-68.542-59.952-84.937-76.328c-24.063-23.938-33.69-35.466-25.195-54.931
                            c37.155-75.78,24.303-169.854-38.72-232.858c-79.235-79.254-207.739-79.254-286.984,0c-79.245,79.264-79.245,207.729,0,287.003
                            c62.985,62.985,157.088,75.837,232.839,38.691c19.466-8.485,31.022,1.142,54.951,25.215c16.384,16.385,76.308,84.937,76.308,84.937
                            c31.089,31.071,55.009,11.95,69.368-2.39C507.232,478.547,526.362,454.638,495.272,423.558z M286.017,286.012
                            c-45.9,45.871-120.288,45.871-166.169,0c-45.88-45.871-45.88-120.278,0-166.149c45.881-45.871,120.269-45.871,166.169,0
                        C331.898,165.734,331.898,240.141,286.017,286.012z"></path>
                    </g>
                </svg>検索条件
            </p>
            <dl class="conditions__selects">
                <dt>大分類</dt>
                <dd>
                <select name="">
                    <option value="A1.1">A1.1</option>
                    <option value="A1.2">A1.2</option>
                    <option value="A1.3">A1.3</option>
                    <option value="A1.4">A1.4</option>
                    <option value="A1.5">A1.5</option>
                    <option value="A1.6">A1.6</option>
                    <option value="A1.7">A1.7</option>
                </select>
                </dd>
                <dt>中分類</dt>
                <dd>
                <select name="">
                    <option value="すべて">すべて</option>
                    <option value="Part1">Part1</option>
                    <option value="Part2">Part2</option>
                    <option value="Part3">Part3</option>
                    <option value="Part4">Part4</option>
                </select>
                </dd>
                <dt>小分類</dt>
                <dd>
                <select name="">
                    <option value="すべて">すべて</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                </dd>
            </dl>
            <p class="conditions__result"><span class="icon-spin"></span>合計<span class="conditions__result__number">〇〇〇</span>件</p>
        </div>
        <div class="table-header">
            <h1 class="elastic__heading">コンテンツ一覧</h1>
            <dl class="table-header__edit">
                <dt>一括操作</dt>
                <dd>
                <button type="button" class="table__edit table__edit--edit">編集</button>
                </dd>
                <dd>
                <button type="button" class="table__edit table__edit--delete">削除</button>
                </dd>
            </dl>
        </div>
    </header>
    <section class="elastic">
        <div class="elastic__table">
            <table class="table table--editable">
                <thead>
                    <tr>
                        <th class="table__cell--category">大分類</th>
                        <th class="table__cell--category">中分類</th>
                        <th class="table__cell--category">小分類</th>
                        <th>小分類-要素</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            自己紹介について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            日常会話での挨拶
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            休日の過ごし方
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            得意なこと、苦手なこと
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part3</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            家族・兄弟について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            日常会話での挨拶
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            休日の過ごし方
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            得意なこと、苦手なこと
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part3</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            家族・兄弟について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            日常会話での挨拶
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            休日の過ごし方
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            得意なこと、苦手なこと
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            自己紹介について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            自己紹介について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            日常会話での挨拶
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            休日の過ごし方
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            得意なこと、苦手なこと
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part3</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            家族・兄弟について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            日常会話での挨拶
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            休日の過ごし方
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            得意なこと、苦手なこと
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part3</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            家族・兄弟について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            日常会話での挨拶
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            休日の過ごし方
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part2</td>
                        <td class="table__cell--category">2</td>
                        <td>
                            得意なこと、苦手なこと
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table__cell--category">A1.1</td>
                        <td class="table__cell--category">Part1</td>
                        <td class="table__cell--category">1</td>
                        <td>
                            自己紹介について
                            <div class="table__utility">
                                <button type="button" class="table__edit table__edit--edit">編集</button>
                                <button type="button" class="table__edit table__edit--delete">削除</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="footer--fixed">
        <ul class="pager">
            <li class="pager__prev">
                <a href="">&lt; 前へ</a>
            </li>
            <li class="is-current">
                <a href="">1</a>
            </li>
            <li>
                <a href="">2</a>
            </li>
            <li>
                <a href="">3</a>
            </li>
            <li>
                <a href="">4</a>
            </li>
            <li>
                <a href="">5</a>
            </li>
            <li class="pager__next">
                <a href="">後へ &gt;</a>
            </li>
        </ul>
    </div>
</main>
@include('admin.elements.modal')
@endsection