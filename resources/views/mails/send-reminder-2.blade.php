<x-mail-layout>

    <span class="preheader-text"
        style="color: transparent; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; visibility: hidden; width: 0; display: none; mso-hide: all;"></span>

    <div
        style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">
    </div>
    <div
        style="background: url({{ asset('assets/img/top-pattern.png') }});height: 80px;background-repeat: repeat;background-size: cover; opacity: 0.3">
    </div>

    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="width:100%;max-width:100%;">
        <tr><!-- Outer Table -->
            <td align="center" bgcolor="#f0f0f0" data-composer>

                <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                    style="width:100%;max-width:100%;">
                    <!-- lotus-header-1 -->
                    <tr>
                        <td align="center" bgcolor="#fff" class="container-padding">

                            <!-- Content -->
                            <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                                class="row" width="580" style="width:580px;max-width:580px;">

                                <tr>
                                    <td align="center" class="center-text">
                                        <div
                                            style=" border-radius: 35px; width:200px; margin: 0 auto 0 auto; background-color: #ca9475;position: relative;top: -45px;">
                                            <a href="{{ url('/') }}" style="border:0px;">
                                                <img style="width:120px;border:0px;display: block!important;"
                                                    src="{{ asset('assets/img/logo-white.png') }}" width="120"
                                                    border="0" alt="intro">
                                                <small
                                                    style="color:white; font-weight: bold;display: block;position: relative;top: -15px;">شركة
                                                    الناسخ المتطور للخدمات</small>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td
                                        style="color: #ca9475;text-align: center;font-size: 1.6rem;font-weight: 900;padding: 10px 0;border-radius: 5px;">
                                        {{ $title }}</td>
                                </tr>

                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                            </table>
                            <!-- Content -->

                        </td>
                    </tr>
                </table>

            </td>
        </tr><!-- Outer-Table -->
    </table>
    <div style="padding:20px 30px; background-color: white; font-size: 13px;">
        <span style="display: block; margin-bottom: 6px; color: #34221e; font-weight:700">
            <i class="fas fa-map" style="color: #ca9475; padding-left:5px"></i>
            <b>
                المملكة العربية السعودية - الفرع
                الرئيسي: حائل - حي المطار
            </b>
        </span>

        <span style="display: block; color: #34221e; font-weight:700">
            <i class="fas fa-envelope" style="color: #ca9475; padding-left:5px"></i> <b>{{ setting('email') }}</b>
        </span>

        <div style="float: left; font-weight: 900;">
            <time
                style="border: 1px solid; background-color: #ca9475; color:white; padding:4px; border-radius: 4px">{{ date('Y-m-d H:i') }}</time>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div
        style="background: url({{ asset('assets/img/bottom-pattern.png') }});height: 35px;background-repeat: repeat;background-size: contain;">
    </div>
    <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%"
        style="width:100%;max-width:100%;">
        <tr><!-- Outer Table -->
            <td align="center" bgcolor="#f0f0f0" data-composer>

                <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation" width="100%"
                    style="width:100%;max-width:100%;">
                    <!-- lotus-header-1 -->
                    <tr>
                        <td align="center" bgcolor="#ca9475" class="container-padding">

                            <!-- Content -->
                            <table border="0" align="center" cellpadding="0" cellspacing="0" role="presentation"
                                class="row" width="580" style="width:580px;max-width:580px;">
                                <tr>
                                    <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" class="center-text">
                                        <a href="{{ url('/') }}" style="border:0px;">
                                            <img style="width:190px;border:0px;display: inline!important;"
                                                src="{{ asset('assets/img/logo-white.png') }}" width="190"
                                                border="0" alt="intro">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="40" style="font-size:40px;line-height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" class="center-text">


                                        <x-social-media-botton key="facebook" />
                                        <x-social-media-botton key="twitter" />
                                        <x-social-media-botton key="tiktok" />
                                        <x-social-media-botton key="instagram" />
                                        <x-social-media-botton key="telegram" />
                                        <x-social-media-botton key="linkedin" />
                                        <x-social-media-botton key="whatsapp" />
                                        <x-social-media-botton key="snapchat" />

                                    </td>
                                </tr>

                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px;line-height:20px;">&nbsp;</td>
                                </tr>
                            </table>
                            <!-- Content -->

                        </td>
                    </tr>
                </table>

            </td>
        </tr><!-- Outer-Table -->
    </table>

</x-mail-layout>
