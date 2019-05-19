<img{!! $attributeString !!}
        data-srcset="{{ $media->getSrcset($conversion) }}"
        onload="this.onload=null;this.sizes=Math.ceil(this.getBoundingClientRect().width/window.innerWidth*100)+'vw';" sizes="1px"
        data-src="{{ $media->getUrl($conversion) }}"
        width="{{ $width }}"
>
