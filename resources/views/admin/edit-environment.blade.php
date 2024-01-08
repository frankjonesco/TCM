<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">
    
    <x-cards.form class="form-md">
    
        <form action="/admin/environment/update" method="POST">
    
            @csrf
            @method('PUT')
    

            
            {{-- ROUTE KEY --}}

            <input type="hidden" name="hex" value="{{$config->hex}}">
    
    
    
            {{-- ENVIRONMENT --}}
    
            <div class="field">
    
    
                <label for="environment">
                    Environment
                </label>
    
    
                <select
                    id="selectedEnvironment"
                    name="environment"
                    onchange="environmentSelected()"
                >

                    <option value="development" {{(old('environment') === 'development') ? 'selected' : (config('settings.environment') == 'development' ? 'selected' : null)}}>
                        Development
                    </option>

                    <option value="production" {{(old('environment') === 'production') ? 'selected' : (config('settings.environment') == 'production' ? 'selected' : null)}}>
                        Production
                    </option>

                </select>
    

                <x-elements.validation-error element="environment" />
    
    
            </div>



            {{-- ASSET BUILDS --}}


            <div id="assetBuilds" class="hidden-field">


                {{-- ASSET BUILD TITLE --}}

                <span class="section-heading">
                    Asset builds
                </span>


                {{-- CSS ASSETS --}}

                <div class="field">

                    <label for="css_assets">
                        CSS assets (separated with comma)
                    </label>

                    <input
                        type="text"
                        name="css_assets"
                        placeholder="CSS assets"
                        value="{{old('css_assets') ?: config('settings.css_assets')}}"
                    >

                    <x-elements.validation-error element="meta_title" />

                </div>


                {{-- JS ASSETS --}}

                <div class="field">

                    <label for="js_assets">
                        JS assets (separated with comma)
                    </label>

                    <input
                        type="text"
                        name="js_assets"
                        placeholder="JS assets"
                        value="{{old('js_assets') ?: config('settings.js_assets')}}"
                    >

                    <x-elements.validation-error element="js_assets" />

                </div>

            </div>


            {{-- BUTTONS --}}

            <div class="buttons">

                <button
                    type="submit"
                    class="btn-success"
                >Update</button>

                <a
                    href="/admin"
                    class="btn-danger"
                >Cancel</a>

            </div>


        </form>


    </x-form-card>



    <script>


        // CONSTANTS


        const assetBuilds = document.querySelector('#assetBuilds');




        // SHOW ASSET BUILD INPUTS IF ENVIROMENT IS PRODUCTION


        window.onload = function(event) {

            if(currentEnvironment() == 'production'){
        
                showAssetBuilds();

            }

        };




        // GET CURRENT SELECTED ENVIRONMENT


        function currentEnvironment(){

            return selectedEnvironment.options[selectedEnvironment.selectedIndex].value;

        }




        // ON ENVIRONMENTS SELECTED


        function environmentSelected(){

            if(currentEnvironment() === 'development'){

                hideAssetBuilds();

            }

            if(currentEnvironment() === 'production'){

                showAssetBuilds();

            }

        }




        // SHOW/HIDE ASSET BUILD INPUTS


        function showAssetBuilds(){
            assetBuilds.classList.replace('hidden-field', 'field');
        }

        function hideAssetBuilds(){
            assetBuilds.classList.replace('field', 'hidden-field');
        }




    </script>



</x-layout.app>