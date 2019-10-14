<section class="section">
    <div class="container">
        <div v-if="articalsFilter && articalsFilter.length">
            <div class="columns is-multiline">
                <div class="column is-one-third center" v-for="artical in articalsFilter">
                    <div class="notification artical">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <a :href="artical.slug">
                                        <img :src="artical.featured_image" alt="Placeholder image" />
                                    </a>
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-5">
                                            <a :href="artical.slug">
                                                @{{ artical.title }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <br />
                                <div class="content">
                                    <a :href="artical.slug">
                                        @{{ artical.summary }}
                                    </a>
                                    <br />
                                </div>
                                <div class="tags">
                                    <span class="tag is-info" v-for="tag in artical.tags">@{{ tag.name }}</span>
                                </div>
                                <time class="right">@{{ artical.published_at }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="help is-danger" v-else>
            No results!Search something else!
        </div>
    </div>
</section>
