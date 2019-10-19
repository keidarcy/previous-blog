<section class="section">
    <div class="container">
        <div v-if="articalsFilter && articalsFilter.length">
            <div class="columns is-multiline">
                <div class="column is-one-third center" v-for="artical in articalsFilter">
                    <div class="notification artical">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <a :href="`/show/${artical.slug}`">
                                        <img :src="artical.featured_image" alt="Placeholder image" />
                                    </a>
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-5">
                                            <a :href="`/show/${artical.slug}`">
                                                @{{ artical.title }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <br />
                                <div class="content">
                                    <a :href="`/show/${artical.slug}`">
                                        @{{ artical.summary }}
                                    </a>
                                    <br />
                                </div>
                                <div class="tags are-medium">
                                    <span class="tag is-dark" v-for="tag in artical.tags"><a
                                            :href="`/posts/${tag.slug}`">@{{ tag.name }}</a></span>
                                </div>
                                <time class="right">@{{ artical.published_at }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="help is-danger" v-else>
            {{ config('frontend.message.no_post') }}
        </div>
    </div>
</section>
