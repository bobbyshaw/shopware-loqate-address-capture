{extends file="parent:frontend/index/index.tpl"}

{block name="frontend_index_header_javascript_jquery_lib"}
    {$smarty.block.parent}

    <script type="text/javascript" src="http://services.postcodeanywhere.co.uk/js/address-3.70.js"></script>
    <script>
        var pcaControl = new pca.Address(
            [
                { element: "street", field: "Line1" },
                { element: "city", field: "City", mode: pca.fieldMode.POPULATE },
                { element: "zipcode", field: "PostalCode" },
                { element: "country", field: "CountryName", mode: pca.fieldMode.COUNTRY }
            ],
            { key: "" }
        );
    </script>
{/block}