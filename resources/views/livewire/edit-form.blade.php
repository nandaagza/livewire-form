<div>
    <div id="fb-editor"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>


<script>
    var fbEditor = document.getElementById('fb-editor');
    var formBuilder = $(fbEditor).formBuilder(
        {
            
        }
    );
    

    $(function() {

        formBuilder.actions.setData([{
                "type": "date",
                "required": false,
                "label": "Date Field",
                "className": "form-control",
                "name": "date-1701506116128-0",
                "access": false,
                "subtype": "date"
            },
            {
                "type": "header",
                "subtype": "h1",
                "label": "Header",
                "access": false
            }
        ]);
    })
</script>
