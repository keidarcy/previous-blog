<h1 class="title center has-text-black">{{ config('frontend.message.more') }}</h1>


<div class="columns">
    @foreach ($post['related'] as $relate)
    <div class="column is-one-third center">
        <div class="card artical">
            <div class="card-image">
                <figure class="image is-5by4">
                    <a href="/show/{{ $relate->slug }}"> <img src="{{ $relate->featured_image }}"
                            alt="Placeholder image">
                    </a>
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-5">
                            <a href="/show/{{ $relate->slug }}">{{ $relate->title }}</a>
                        </p>
                        @foreach ($relate->tags as $tag)
                        <div class="tags">
                            <span class="tag is-info is-small">{{ $tag->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
