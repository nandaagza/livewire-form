<div>
    <form>

        {{ $this->form }}

        <div id="fb-editor" style="margin-top: 2rem" required></div>

        <div>Hello This is create form</div>
    </form>

    <x-filament-actions::modals />
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ URL::asset('assets/form-builder/form-builder.min_1.js') }}"></script>

<script>
    jQuery(function($) {
        var container = document.getElementById('fb-editor');
        var fields = [{
                label: "Email",
                type: "text",
                subtype: "email",
                icon: "&#128233;"
            },
            {
                label: "Address",
                type: "select",
                subtype: "address",
                icon: "&#x1F3E0;",
                columns: 3
            }
        ];
        // $(container).formBuilder({ fields });
        $(document.getElementById('fb-editor')).formBuilder({
            fields: fields,
            onSave: function(evt, formData) {
                console.log(formData);
                @this.dispatch('create', {
                    message: formData
                });
                // @this.data = formData;
                // saveForm(formData);
            },
        });
    });
</script>
