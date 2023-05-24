<div>
    <img src="{{$imageSrc}}" alt="{{$imageAlt}}"
         @if($imageWidth)
             width="{{$imageWidth}}"
         @endif
         @if($imageHeight)
             height="{{$imageHeight}}"
        @endif
        @class([
        'rounded-circle' => $imageMode === 'circle'
])
    >
</div>
