@props(['post'])
<div>

    <article class="shadow bg-white rounded-lg overflow-hidden">
        <a href="{{route('posts.show',$post)}}">

            <img src="@if($post->image){{Storage::url($post->image->url)}}
                    @endif" alt="{{$post->name}}" class="rounded h-[15rem] w-full object-cover">
        </a>

        <div class="px-6 py-3">
            <h1>
                <a href="{{route('posts.show',$post)}}" class="font-bold text-xl">
                    {{$post->name}}
                </a>
            </h1>

            <div class="text-gray-700 text-base post-detail">
                {!! html_entity_decode($post->extract) !!}

            </div>

            <div class="px-6 py-2">
                @foreach ($post->tags as $tag)
                <a href="{{route('posts.tag',$tag)}}"
                    class=" cursor-pointer   text-white text-[15px] font-medium mr-2 px-2 py-0.6 rounded  bg-{{$tag->color}}">{{$tag->name}}</a>
                @endforeach
            </div>

        </div>
    </article>
</div>