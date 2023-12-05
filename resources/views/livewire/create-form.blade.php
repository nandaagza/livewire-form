<div>

    <form>
        {{ $this->form }}
        <div id="fb-editor" style="margin-top: 2rem"></div>
    </form>
    <x-filament-actions::modals />
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<!-- <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script> -->
<script src="{{ URL::asset('assets/form-builder/form-builder.min_1.js') }}"></script>
<script>
    jQuery(function($) {
        var container = document.getElementById('fb-editor');
        var fields = [{
            label: "Email",
            type: "text",
            subtype: "email",
            icon: "&#128231;"
        }, ];
        var region = [];
        var town = [];
        var qua = [];
        var regions = <?php echo json_encode($regions); ?>;
        var township = <?php echo json_encode($townships); ?>;
        var quarter = <?php echo json_encode($quarters); ?>;

        for (const key in regions) {
            region = [...region,
                {
                    label: regions[key],
                    value: key,
                }
            ]
        }
        for (const key in township) {
            town = [...town,
                {
                    label: township[key],
                    value: key,
                }
            ]
        }
        for (const key in quarter) {
            qua = [...qua,
                {
                    label: quarter[key],
                    value: key,
                }
            ]
        }
        console.log(regions);
        var inputSets = [{
                label: 'Address',
                name: 'address',
                showHeader: true,
                icon: "&#x1F3E0",
                fields: [{
                        type: 'select',
                        label: 'Region',
                        className: 'form-control',
                        values: region,
                    },
                    {
                        type: 'select',
                        label: 'Township',
                        className: 'form-control',
                        values: town
                    },
                    {
                        type: 'select',
                        label: 'Quarter',
                        className: 'form-control',
                        values: qua
                    },
                ]
            },
            {
                label: 'National ID',
                showHeader: true,
                icon: "&#x1F3E1",
                fields: [{
                        type: 'select',
                        label: 'nrc_code',
                        className: 'form-control',
                        values: [{
                                label: '1/',
                                value: 'option-2',
                                selected: false
                            },
                            {
                                label: '2/',
                                value: 'option-3',
                                selected: false
                            },
                            {
                                label: '3/',
                                value: 'option-3',
                                selected: false
                            }
                        ]
                    },
                    {
                        type: 'select',
                        label: 'nrc_name',
                        className: 'form-control',
                        values: [{
                                label: 'YATANA',
                                value: 'option-2',
                                selected: false
                            },
                            {
                                label: 'APATA',
                                value: 'option-3',
                                selected: false
                            }
                        ]
                    },
                    {
                        type: 'select',
                        label: 'nrc_type',
                        className: 'form-control',
                        values: [{
                                label: 'N',
                                value: 'option-2',
                                selected: false
                            },
                            {
                                label: 'E',
                                value: 'option-3',
                                selected: false
                            },
                            {
                                label: 'P',
                                value: 'option-3',
                                selected: false
                            }
                        ]
                    },
                    {
                        "type": "number",
                        "label": "Number",
                        "className": "form-control",
                        "min": 0,
                        "max": 999999
                    },
                ]
            }
        ];
        $(document.getElementById('fb-editor')).formBuilder({
            fields: fields,
            inputSets: inputSets,
            onSave: function(evt, formData) {
                console.log(formData);
                @this.dispatch('create', {
                    message: formData
                });
            },
        });
    });
</script>
