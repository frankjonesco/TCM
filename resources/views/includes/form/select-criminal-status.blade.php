<div class="field">

    <label for="crimina_status">
        Criminal status
    </label>

    <select id="selectCriminalStatus" name="criminal_status" onchange="showHideElements()">

        <option 
            value="{{null}}" 
            selected
        >Select criminal status...</option>

        @php
            $value = 'Person of interest';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Unver investigation';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Wanted';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Awaiting trial';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Acquitted';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Convicted (awaiting sentencing)';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Convicted';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

        @php
            $value = 'Exonerated';
        @endphp
        <option 
            value="{{$value}}" 
            {{(old('criminal_status') === $value) ? 'selected' : ((isset($criminal->criminal_status) && $criminal->criminal_status == $value) ? 'selected' : null)}}
        >{{$value}}</option>

    </select>
</div>

<script>

    // OPTIONS

    // Person of interest
    // Unver investigation
    // Wanted
    // Awaiting Trial
    // Acquitted
    // Convicted (awaiting sentencing)
    // Convicted
    // Exonerated


    // ELEMENTS

    // arrestDate
    // convictionDate
    // trialDate
    // acquittalDate
    // sentencingDate
    // freedDate
    // sentenceInput

    const selectCriminalStatus = document.querySelector('#selectCriminalStatus');

    window.onload = function(event) {
        showHideElements()
    };    

   

    function showHideElements(){

        let selectedOption = selectCriminalStatus.options[selectCriminalStatus.selectedIndex].value;

        var elements = document.querySelectorAll('.criminal-status-elements');

        // Person of interest
        if(selectedOption == 'Person of interest'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
            }
        }

        // Unver investigation
        if(selectedOption == 'Unver investigation'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
            }
        }

        // Wanted
        if(selectedOption == 'Wanted'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
            }
        }

        // Awaiting trial
        if(selectedOption == 'Awaiting trial'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
                parent.document.querySelector('#arrestDate').classList.remove('hidden');
                parent.document.querySelector('#trialDate').classList.remove('hidden');
            }
        }

        // Acquitted
        if(selectedOption == 'Acquitted'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
                parent.document.querySelector('#arrestDate').classList.remove('hidden');
                parent.document.querySelector('#acquittalDate').classList.remove('hidden');
                parent.document.querySelector('#trialDate').classList.remove('hidden');
            }
        }

        // Convicted (awaiting sentencing)
        if(selectedOption == 'Convicted (awaiting sentencing)'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
                parent.document.querySelector('#arrestDate').classList.remove('hidden');
                parent.document.querySelector('#trialDate').classList.remove('hidden');
                parent.document.querySelector('#convictionDate').classList.remove('hidden');
                parent.document.querySelector('#sentencingDate').classList.remove('hidden');
            }
        }

        // Convicted
        if(selectedOption == 'Convicted'){
        console.log('as');
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
                parent.document.querySelector('#arrestDate').classList.remove('hidden');
                parent.document.querySelector('#trialDate').classList.remove('hidden');
                parent.document.querySelector('#convictionDate').classList.remove('hidden');
                parent.document.querySelector('#sentencingDate').classList.remove('hidden');
                parent.document.querySelector('#sentenceInput').classList.remove('hidden');
            }
        }

        // Exonerated
        if(selectedOption == 'Exonerated'){
            for (var i = 0, len = elements.length; i < len; i++) {
                if(!elements[i].classList.contains('hidden')){
                    elements[i].classList.add('hidden')
                }
                parent.document.querySelector('#arrestDate').classList.remove('hidden');
                parent.document.querySelector('#trialDate').classList.remove('hidden');
                parent.document.querySelector('#convictionDate').classList.remove('hidden');
                parent.document.querySelector('#sentencingDate').classList.remove('hidden');
                parent.document.querySelector('#sentenceInput').classList.remove('hidden');
                parent.document.querySelector('#freedDate').classList.remove('hidden');
            }
        }
    }

</script>   

