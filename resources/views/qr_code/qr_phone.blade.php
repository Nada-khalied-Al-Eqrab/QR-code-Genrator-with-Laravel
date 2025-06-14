@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header    d-flex" >
                        {{ __('QR Builder') }}
                          <div class="ml-auto">
                            <a href="{{ route('qr_builder') }}">QR Builder</a>   .
                            <a href="{{ route('qr_phone') }}">Phone</a>   .
                            <a href="{{ route('qr_email') }}">E-mail</a>   .
                            <a href="{{ route('qr_geo') }}">GEO</a>   .
                            <a href="{{ route('qr_sms') }}">SMS</a>   .
                        </div>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{!! $code !!}} --}}
                        <div class="text-center">
                            {!! QrCode::phoneNumber('555-555-5555')!!}

                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-size">QR Size</label>
                                                <select name="qr-size" value="{{ old('qr-size') }}" class="form-control">
                                                    <option value="">Select Size</option>
                                                    <option value="300">300x300</option>
                                                    <option value="600">600x600</option>
                                                    <option value="900">900x900</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-img-type">Image Type</label>
                                                <select name="qr-img-type" value="{{ old('qr-img-type') }}"
                                                    class="form-control">
                                                    <option value="">Select Image Type</option>
                                                    <option value="png">PNG</option>
                                                    <option value="svg">SVG</option>
                                                    <option value="eps">EPS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-correction">Image Correction</label>
                                                <select name="qr-correction" value="{{ old('qr-correction') }}"
                                                    class="form-control">
                                                    <option value="">Select Image Correction</option>
                                                    <option value="L">7%</option>
                                                    <option value="M">15%</option>
                                                    <option value="Q">25%</option>
                                                    <option value="H">30%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-encoding">Image Encoding</label>
                                                <select name="qr-encoding" value="{{ old('qr-encoding') }}"
                                                    class="form-control">
                                                    <option value="">Select Image Encoding</option>
                                                    <option value="UTF-8">UTF-8</option>
                                                    <option value="ISO-8859-1">ISO-8859-1</option>
                                                    <option value="ISO-8859-2">ISO-8859-2</option>
                                                    <option value="ISO-8859-3">ISO-8859-3</option>
                                                    <option value="ISO-8859-4">ISO-8859-4</option>
                                                    <option value="ISO-8859-5">ISO-8859-5</option>
                                                    <option value="ISO-8859-6">ISO-8859-6</option>
                                                    <option value="ISO-8859-7">ISO-8859-7</option>
                                                    <option value="ISO-8859-8">ISO-8859-8</option>
                                                    <option value="ISO-8859-9">ISO-8859-9</option>
                                                    <option value="ISO-8859-10">ISO-8859-10</option>
                                                    <option value="ISO-8859-11">ISO-8859-11</option>
                                                    <option value="ISO-8859-12">ISO-8859-12</option>
                                                    <option value="ISO-8859-13">ISO-8859-13</option>
                                                    <option value="ISO-8859-14">ISO-8859-14</option>
                                                    <option value="ISO-8859-15">ISO-8859-15</option>
                                                    <option value="ISO-8859-16">ISO-8859-16</option>
                                                    <option value="SHIFT-JIS">SHIFT-JIS</option>
                                                    <option value="WINDOWS-1250">WINDOWS-1250</option>
                                                    <option value="WINDOWS-1251">WINDOWS-1251</option>
                                                    <option value="WINDOWS-1252">WINDOWS-1252</option>
                                                    <option value="WINDOWS-1256">WINDOWS-1256</option>
                                                    <option value="UTF-16BE">UTF-16BE</option>
                                                    <option value="ASCII">ASCII</option>
                                                    <option value="GBK">GBK</option>
                                                    <option value="EUC-KR">EUC-KR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <br><hr><br>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-eye">QR Eye</label>
                                                <select name="qr-eye" value="{{ old('qr-eye') }}" class="form-control">
                                                    <option value="">Select QR Eye</option>
                                                    <option value="square">Square</option>
                                                    <option value="circle">Circle</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-margin">QR Margin</label>
                                                <input type="number" name="qr-margin" value="{{ old('qr-margin', 0) }}"
                                                    max="100" min="0" step="1" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-style">QR Style</label>
                                                <select name="qr-style" value="{{ old('qr-style') }}"
                                                    class="form-control">
                                                    <option value="">Select QR Style</option>
                                                    <option value="square">Square</option>
                                                    <option value="dot">Dot</option>
                                                    <option value="round">Round</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="qr-color">QR Color</label>
                                                <input type="color" name="qr-color"
                                                    value="{{ old('qr-color', '#000000') }}" class="form-control">
                                            </div>
                                        </div>

                                        <br><hr><br>

                                        <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr-background-color">QR Background Color</label>
                                                <input type="color" name="qr-background-color"
                                                    value="{{ old('qr-background-color', '#FFFFFF') }}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                             <div class="form-group">
                                                <label for="qr-background-transparent">QR Background Transparent</label>
                                                <input type="number" name="qr-background-transparent" value="{{ old('qr-background-transparent', 0) }}"
                                                    max="100" min="0" step="1" class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <br><br><hr><br>

                                        <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr-eye-color-inner-0">QR Eye Color Inner 0</label>
                                                <input type="color" name="qr-eye-color-inner-0"
                                                    value="{{ old('qr-eye-color-inner-0', '#000000') }}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                             <div class="form-group">
                                                <label for="qr-eye-color-outer-0">QR Eye Color Outer 0</label>
                                                <input type="color" name="qr-eye-color-outer-0" value="{{ old('qr-eye-color-outer-0', '#000000') }}"
                                                   class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                    <br><hr><br>

                                        <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr-eye-color-inner-1">QR Eye Color Inner 1</label>
                                                <input type="color" name="qr-eye-color-inner-1"
                                                    value="{{ old('qr-eye-color-inner-1', '#000000') }}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                             <div class="form-group">
                                                <label for="qr-eye-color-outer-1">QR Eye Color Outer 1</label>
                                                <input type="color" name="qr-eye-color-outer-1" value="{{ old('qr-eye-color-outer-1', '#000000') }}"
                                                   class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <br><hr><br>

                                        <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="qr-eye-color-inner-2">QR Eye Color Inner 2</label>
                                                <input type="color" name="qr-eye-color-inner-2"
                                                    value="{{ old('qr-eye-color-inner-2', '#000000') }}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-6">
                                             <div class="form-group">
                                                <label for="qr-eye-color-outer-2">QR Eye Color Outer 2</label>
                                                <input type="color" name="qr-eye-color-outer-2" value="{{ old('qr-eye-color-outer-2', '#000000') }}"
                                                   class="form-control">
                                            </div>

                                        </div>
                                    </div>

                                    <br><hr><br>

                                        <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr-gradient-start">QR Gradient Start</label>
                                                <input type="color" name="qr-gradient-start"
                                                    value="{{ old('qr-gradient-start', '#000000') }}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="qr-gradient-end">QR Gradient End</label>
                                                <input type="color" name="qr-gradient-end"
                                                    value="{{ old('qr-gradient-end', '#000000') }}" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-4">
                                             <div class="form-group">
                                                <label for="qr-gradient-type">QR gradient Types</label>
                                                <select name="qr-gradient-type" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="vertical">Vertical</option>
                                                    <option value="horizontal">Horizontal</option>
                                                    <option value="diagonal">Diagonal</option>
                                                    <option value="inverse_diagonal">Inverse Diagonal</option>
                                                    <option value="radial">Radial</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>









                                    </div>


                                    <br>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary"> Generate QR Code
                                        </button>
                                    </div>




                                </form>
                            </div>
                            <div class="col-4">
                                @if (session('code'))
                                    @if (pathInfo(session('code'))['extension'] === 'eps')
                                        QR Code available , <a href="{{ asset('QRCode/' . session('code')) }}">click
                                            here</a>
                                        to download it.
                                    @else
                                        {{-- {!! session('code') !!} --}}
                                        <img src="{{ asset('QRCode/' . session('code')) }}" alt="{{ session('code') }}"
                                            class="img-fluid">
                                        <br>
                                        QR Code available , <a href="{{ asset('QRCode/' . session('code')) }}">click
                                            here</a>
                                        to download it.
                                    @endif
                                @endif


                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
