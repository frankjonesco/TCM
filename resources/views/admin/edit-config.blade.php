<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">
    
    
    <x-cards.form class="form-lg">


        <form action="/admin/config/update" method="POST">


            @csrf
            @method('PUT')




            {{-- ROUTE KEY --}}


            <input type="hidden" name="hex" value="{{$config->hex}}">




            {{-- META TITLE --}}


            <div class="field">


                <label for="meta_title">
                    Meta title
                </label>


                <input
                    type="text"
                    name="meta_title"
                    placeholder="Meta title"
                    value="{{old('meta_title') ?: $config->meta_title}}"
                >

                <x-elements.validation-error element="meta_title" />


            </div>




            {{-- META DESCRIPTION --}}


            <div class="field">


                <label for="meta_description">
                    Meta description
                </label>


                <textarea 
                    name="meta_description"
                    placeholder="Meta description"
                    rows="5"
                >{{old('meta_description') ?: $config->meta_description}}</textarea>


                <x-elements.validation-error element="meta_description" />


            </div>




            {{-- META KEYWORDS --}}


            <div class="field">


                <label for="meta_keywords">
                    Meta keywords
                </label>


                <textarea
                    name="meta_keywords"
                    placeholder="Meta keywords"
                    rows="5"
                >{{old('meta_keywords') ?: $config->meta_keywords}}</textarea>


                <x-elements.validation-error element="meta_keywords" />


            </div>




            {{-- META AUTHOR --}}


            <div class="field">


                <label for="meta_author">
                    Meta author
                </label>


                <input
                    type="text"
                    name="meta_author"
                    placeholder="Meta author"
                    value="{{old('meta_author') ?: $config->meta_author}}"
                >


                <x-elements.validation-error element="meta_author" />


            </div>




            {{-- META IMAGE --}}


            <div class="field">


                <label for="meta_image">
                    Meta image
                </label>


                <input
                    type="text"
                    name="meta_image"
                    placeholder="Meta image"
                    value="{{old('meta_image') ?: $config->meta_image}}"
                >


                <x-elements.validation-error element="meta_image" />


            </div>




            {{-- CONTACT EMAIL --}}


            <div class="field">


                <label for="contact_email">
                    Contact email
                </label>


                <input
                    type="text"
                    name="contact_email"
                    placeholder="Contact email"
                    value="{{old('contact_email') ?: $config->contact_email}}"
                >


                <x-elements.validation-error element="contact_email" />


            </div>




            {{-- COPYRIGHT --}}


            <div class="field">


                <label for="copyright">
                    Copyright
                </label>


                <input
                    type="text"
                    name="copyright"
                    placeholder="Copyright"
                    value="{{old('copyright') ?: $config->copyright}}"
                >


                <x-elements.validation-error element="copyright" />


            </div>




            {{-- POWERED BY --}}


            <div class="field">


                <label for="powered_by">
                    Powered by
                </label>


                <input
                    type="text"
                    name="powered_by"
                    placeholder="Powered by"
                    value="{{old('powered_by') ?: $config->powered_by}}"
                >


                <x-elements.validation-error element="powered_by" />


            </div>




            {{-- POWERED BY LINK --}}


            <div class="field">


                <label for="powered_by_link">
                    Powered by link
                </label>


                <input
                    type="text"
                    name="powered_by_link"
                    placeholder="Powered by link"
                    value="{{old('powered_by_link') ?: $config->powered_by_link}}"
                >


                <x-elements.validation-error element="powered_by_link" />


            </div>




            {{-- ALLOW REGISTRATION --}}


            <div class="field">


                <label for="allow_registration">
                    Allow registration
                </label>


                <select name="allow_registration" id="allowRegistration">
                    
                    <option value="{{false}}" {{(old('allow_registration') === false) ? 'selected' : ($config->allow_registration == false ? 'selected' : null)}}>No</option>

                    <option value="{{true}}" {{(old('allow_registration') === true) ? 'selected' : ($config->allow_registration == true ? 'selected' : null)}}>Yes</option>

                </select>


                <x-elements.validation-error element="allow_registration" />


            </div>




            {{-- ALLOW COMMENTS --}}


            <div class="field">


                <label for="allow_comments">
                    Allow comments
                </label>


                <select name="allow_comments" id="allowComments">

                    <option value="{{false}}" {{(old('allow_comments') === false) ? 'selected' : ($config->allow_comments == false ? 'selected' : null)}}>No</option>

                    <option value="{{true}}" {{(old('allow_comments') === true) ? 'selected' : ($config->allow_comments == true ? 'selected' : null)}}>Yes</option>

                </select>


                <x-elements.validation-error element="allow_comments" />


            </div>




            {{-- FACEBOOK URL --}}


            <div class="field">


                <label for="facebook_url">
                    Facebook URL
                </label>


                <input
                    type="text"
                    name="facebook_url"
                    placeholder="Facebook URL"
                    value="{{old('facebook_url') ?: $config->facebook_url}}"
                >


                <x-elements.validation-error element="facebook_url" />


            </div>




            {{-- TWITTER URL --}}


            <div class="field">


                <label for="twitter_url">
                    Twitter URL
                </label>


                <input
                    type="text"
                    name="twitter_url"
                    placeholder="Twitter URL"
                    value="{{old('twitter_url') ?: $config->twitter_url}}"
                >


                <x-elements.validation-error element="twitter_url" />


            </div>




            {{-- YOUTUBE URL --}}


            <div class="field">


                <label for="youtube_url">
                    Youtube URL
                </label>


                <input
                    type="text"
                    name="youtube_url"
                    placeholder="Youtube URL"
                    value="{{old('youtube_url') ?: $config->youtube_url}}"
                >


                <x-elements.validation-error element="youtube_url" />


            </div>




            {{-- INSTAGRAM URL --}}


            <div class="field">


                <label for="instagram_url">
                    Instagram URL
                </label>


                <input
                    type="text"
                    name="instagram_url"
                    placeholder="Instagram URL"
                    value="{{old('instagram_url') ?: $config->instagram_url}}"
                >


                <x-elements.validation-error element="instagram_url" />


            </div>




            {{-- CONTENT IMAGE WIDTH --}}


            <div class="field">


                <label for="content_image_width">
                    Content image width
                </label>


                <input
                    type="text"
                    name="content_image_width"
                    placeholder="Content image width"
                    value="{{old('content_image_width') ?: $config->content_image_width}}"
                >


                <x-elements.validation-error element="content_image_width" />


            </div>




            {{-- CONTENT IMAGE HEIGHT --}}


            <div class="field">


                <label for="content_image_height">
                    Content image height
                </label>


                <input
                    type="text"
                    name="content_image_height"
                    placeholder="Content image height"
                    value="{{old('content_image_height') ?: $config->content_image_height}}"
                >


                <x-elements.validation-error element="content_image_height" />


            </div>




            {{-- PAGINATION ITEMS --}}


            <div class="field">


                <label for="allow_comments">
                    Pagination items
                </label>


                <select name="pagination_items" id="paginationItems">

                    <?php 
                        $x = 1;
                        while($x <= 100){ ?>
                            <option value="{{$x}}" class="text-center" {{(old('pagination_items') === $x) ? 'selected' : ($config->pagination_items == $x ? 'selected' : null)}}>{{$x}}</option>
                        <?php
                        $x++;
                    } ?>

                </select>


                <x-elements.validation-error element="pagination_items" />


            </div>



            
            {{-- SITE OFFLINE --}}


            <div class="field">


                <label for="site_offline">
                    Site offline
                </label>


                <select name="site_offline" id="siteOffline">

                    <option value="{{false}}" {{(old('site_offline') === false) ? 'selected' : ($config->site_offline == false ? 'selected' : null)}}>No</option>

                    <option value="{{true}}" {{(old('site_offline') === true) ? 'selected' : ($config->site_offline == true ? 'selected' : null)}}>Yes</option>

                </select>


                <x-elements.validation-error element="site_offline" />


            </div>




            {{-- BUTTONS --}}


            <div class="buttons">

                <button
                    type="submit" 
                    class="btn-success"
                >Save</button>

                <a 
                    href="/admin"
                    class="btn-danger"
                >Cancel</a>

            </div>


        </form>


    </x-cards.form>


</x-layout.app>