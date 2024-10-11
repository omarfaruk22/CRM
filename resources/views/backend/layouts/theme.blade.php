

<style>
    .sidebar-wrapper .metismenu .mm-active > a,
        .sidebar-wrapper .metismenu a:active,
        .sidebar-wrapper .metismenu a:focus,
        .sidebar-wrapper .metismenu a:hover {
            color: #ffffff;
            text-decoration: none;
            background-color: rgb(0, 140, 255);
        }

        .topbar a{
            color:black !;
     }

     .user-info p{
         color:black!important;
     }



</style>


@if(isset(themecolor()->sidebar_color))
    <style>
    .sidebar-wrapper ul {
        background: {{ themecolor()->sidebar_color }};
    }
    .sidebar-wrapper .metismenu a {
        color: {{ themecolor()->sidebar_link_color }};
        }
    .sidebar-header{
        background: {{ themecolor()->sidebar_color }};
    }

    .topbar {
        background  : {{ themecolor()->top_header_background_color }};
     };

    </style>
    @else
    <style>
        .sidebar-wrapper .metismenu a {
            color: black;
        }


    </style>
@endif


@if(isset(themecolor()->header_link_color))
   <style >
     .topbar a{
            color:{{ themecolor()->header_link_color }}!important;
     }
     /* .topbar a:hover{
            color:{{ themecolor()->header_link_color }}!important;
            background: black!important;
     } */

     .user-info p{
         color:{{ themecolor()->header_link_color }}!important;
     }

    </style>
    @else
    <style>
        .topbar a {
            color: black !important;
        }
    </style>
@endif


@if(isset(themecolor()->sidebar_active_item_color))
<style>
    .sidebar-wrapper .metismenu .mm-active > a,
    .sidebar-wrapper .metismenu a:active,
    .sidebar-wrapper .metismenu a:focus,
    .sidebar-wrapper .metismenu a:hover {
    color: {{ themecolor()->sidebar_active_item_color}};
    text-decoration: none;
    background-color: {{ themecolor()->sidebar_active_item_background_color }};
    }
    </style>
@else

@endif




<style>
        .show a {
        color: black!important;
    }

</style>



