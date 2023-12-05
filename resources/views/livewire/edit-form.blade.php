<?php
$ok = json_encode($this->form_template->content);
?>
<div>
    <label for="name">Name</label>
    <input type="text" id="name" name="name" class="form-control" wire:model="name" />


    <input type="hidden" id="hide_me" value="{{ $ok }}">



    {{-- {{ $form_template }} --}}
    <div id="fb-editor"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ URL::asset('assets/form-builder/form-builder.min_1.js') }}"></script>



<script>
    $(document).ready(function() {
        let bb = document.getElementById("hide_me");
        var fbEditor = document.getElementById('fb-editor');

        // Function to initialize the form builder with data
        function initializeFormBuilder(data) {
            $(fbEditor).formBuilder({
                formData: data,
                onSave: function(evt, formData) {
                    console.log("Form data saved:", formData);
                    @this.dispatch('update', {
                        content: formData
                    });
                },
            });
        }

        // Fetch data and initialize form builder
        var fetchDataPromise = new Promise(function(resolve) {
            // Simulate data fetching, replace this with your actual data fetching logic
            setTimeout(function() {
                var formData = JSON.parse(bb.value);
                resolve(formData);
            }, 50); // Adjust the timeout as needed
        });

        fetchDataPromise.then(function(data) {
            initializeFormBuilder(data);
        });
    });
</script>
