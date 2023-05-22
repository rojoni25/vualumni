<div style="border-bottom: 2px solid #777; background-color: wheat; ">
    <marquee onMouseOver="this.setAttribute('scrollamount', 0, 0);" OnMouseOut="this.setAttribute('scrollamount', 6, 0);">
        <ul style="margin-top: 10px;" class="vu-marquee">
            @forelse ($marquees as $marquee)
                <li style="display:inline-block; padding-right:20px;">
                    <a href="{{$marquee->content_url}}">{{$marquee->title}}</a>
                </li>
            @empty
            @endforelse
        </ul>
    </marquee>

</div>
