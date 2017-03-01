@extends('layouts.site')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Portfolio</div>
                <div class="panel-body">
                    My Github account: <a target="_blank"href="https://github.com/mikrou">mikrou</a>
                    <ul class="portfolioList">
                        <a href="game"><li class="btn btn-primary">Cannon Climb</li></a>
                        <li class="btn btn-primary" onclick="run();">Rock Paper Scissors Lizard Spock</li>
                        <a target="_blank" href="https://wildtv.ca/html5"><li class="btn btn-primary">WildTV app</li></a>
                        <a target="_blank" href="http://myhuntfix.com"><li class="btn btn-primary">MyHuntFix</li></a>
                        <a href="/artwork"><li class="btn btn-primary">My artwork</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="/js/game2.js"></script>