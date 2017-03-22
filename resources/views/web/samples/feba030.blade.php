@extends('web.layouts.main')
@section('content')
<div class="dv-content">
    <h1 class="h1-header align-center">
        以下から学習するパートを選びましょう。 <br>
        小分類選択画面の説明テキストが入ります。
    </h1>
    <div class="progress-part">
        <div class="dv dv-6">
            <div class="recommend">
                <span class=""><i>★</i> オススメ取組み</span>
            </div>
            <div class="skillbar" data-percent="25%">
                <div class="skillbar-title">
                    <span class="ti-pencil"></span>
                    <p>ポイント</p>
                </div>
                <div class="skillbar-bar"></div>
                <div class="skill-detail">
                    <span>Part 1</span>
                </div>
                <div class="skill-bar-percent"><span>25</span>%</div>
            </div>
        </div>
        <div class="dv dv-6">
            <div class="skillbar" data-percent="35%">
                <div class="skillbar-title">
                    <span class="ti-pencil"></span>
                    <p>ポイント</p>
                </div>
                <div class="skillbar-bar"></div>
                <div class="skill-detail">
                    <span>Part 1</span>
                </div>
                <div class="skill-bar-percent"><span>35</span>%</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="progress-part">
        <div class="dv dv-6">
            <div class="skillbar" data-percent="35%">
                <div class="skillbar-title">
                    <span class="ti-pencil"></span>
                    <p>ポイント</p>
                </div>
                <div class="skillbar-bar"></div>
                <div class="skill-detail">
                    <span>Part 1</span>
                </div>
                <div class="skill-bar-percent"><span>35</span>%</div>
            </div>
        </div>
        <div class="dv dv-6">
            <div class="skillbar" data-percent="65%">
                <div class="skillbar-title">
                    <span class="ti-pencil"></span>
                    <p>ポイント</p>
                </div>
                <div class="skillbar-bar"></div>
                <div class="skill-detail">
                    <span>Part 1</span>
                </div>
                <div class="skill-bar-percent"><span>65</span>%</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="progress-part">
        <div class="dv dv-6">
            <div class="skillbar" data-percent="0%">
                <div class="skillbar-title">
                    <span class="ti-book"></span>
                    <p>ポイント</p>
                </div>
                <div class="skillbar-bar"></div>
                <div class="skill-detail">
                    <span>Part 1</span>
                </div>
            </div>
        </div>
        <div class="dv dv-6">
            <div class="skillbar" data-percent="100%">
                <div class="skillbar-title">
                    <span class="ti-check-box"></span>
                    <p>ポイント</p>
                </div>
                <div class="skillbar-bar"></div>
                <div class="skill-detail">
                    <span>Part 1</span>
                </div>
                <div class="skill-bar-percent"><span>100</span>%</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
@endsection