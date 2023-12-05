<div class="custom-x-component">
    <div class="user-x-div">
        @if(str_contains($userimage, "data:image/"))
            <img src="{{$userimage}}"/>
        @else
            <img src="data:image/png;base64,{{$userimage}}"/>
        @endif

        <p>{{$username}} • <span>Follow</span> • {{$likescount}}</p>

        <i class="ri-more-fill"></i>
    </div>

    @if(str_contains($userimage, "data:image/"))
        <img src="{{$userimage}}"/>
    @else
        <img src="data:image/png;base64,{{$userimage}}"/>
    @endif

    <div class="ui-x-pannel">
        <i
        style="margin-left: 0.8rem"
        id="like-icon"
        class="ri-heart-line"
        onclick="LikeBtn(this)"
        wire:click="AddLikeCount"
        ></i>
        <i id="chat-x" class="ri-chat-3-line" style="margin-left: 0.47rem"></i>
        <i id="send-x" class="ri-navigation-line" style="margin-left: 0.67rem"></i>
    </div>


    <div class="description-x-div">
        <p>efuewufbeuibu bguiewiyu yfeyi gfyew f79ueqg 7u9f geq79uf gweq9
            f ywiqfyv wqy8f w7q8g f79wq gf79wg q79fg wq79gf 79wqg f79wqg 7u9f
            uqvftueq vyuf yfg y8qwg fy8qwg 7f gwq78fg 7wqf g7wqg f79wqh 8f9w hf4
            fueqvufvqyufvtuywqvfyuvwyfqw7vf78wqvry8wqfvy8fvwy8fvwyq9fvy9wqvfy9wq
            fyiwqfyuvwqyiufvqwyifyiqwvfyiqbfvwqfieqvfyebipfjnbiyewvfbipewnbyifeof
            fvgviebqioctwqhjfoehyifoweil;vi0rwvfyiuweokf yefuoieq9f yeqg fh9qefiqeyouf
            fyueqvfuoqwyfveqbjnkmfeqgy fuohiqjofgeqwuodhjwqfgwquoh g80gf 79wq gf80wq 
            fyiqyf wq78g f87qwg89 79qw fg80qwf79fwq90   79gw89fgwq89fg 7wqg 89eqf89q f79 
            fbuq fqw8 gf78wgq78 fwq gf78 wq7f gwq68 f7g79qw d7g q7f9gqw89fg79wq gff  q9fv
            fea if 78g79 78 g97f g79f g79eqg fyeqv yifuh squivfyidhfudauifhuadgf fu0g f
            fhjbqhif yuqe vyy g df 79 8gf78 gd7 gqifh 9eq gifp jhduig duoiqw9 dg8fqwef08qwe
             fueqgygyq8ef 79dgqw7 f79qewg 78vf9g w79 qwyf6f7qew fqwf7wq97 f7wqf7wq97
        </p>
    </div>
</div>

