@extends('layouts.main')

@section('title','Archieves')
@section('content')
        <div>
            <a href="archives">
                <img alt="LOGO" src="https://images.cdn4.stockunlimited.net/clipart/home-button_1481470.jpg"
                width="50" height="50">
            </a>
        </div>

        <div class="container">
            <div class="jumbotron">
            <form action="/upload" method="GET" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="flex-center position-ref full-height">

                <h2 class="main-heading">Select type of the document you upload</h2>
                    <div class="subscribe-card-container">
                    <div class="subscribe-card">
                   <br>

                        <div class="input">
                            <input type="radio" name="file" id="form-pdf" required>
                            <label for="form-name">PDF</label>
                        </div>
                        <div class="input">
                            <input type="radio" name="file" id="form-doc" required>
                            <label for="form-email">DOC</label>
                        </div>
                        <div class="input">
                            <input type="radio" name="file" id="form-exel" required>
                            <label for="form-email">EXEL</label>
                        </div>
                        <div class="input">
                            <input type="radio" name="file" id="form-image" required>
                            <label for="form-email">IMAGES</label>
                        </div>
                    <br>

                        <h3>Select the privacy of this document</h3><br>
                        <h4>Can be viewd by</h4>

                        <form>
                            <input type="checkbox" id="one" name="one" value="editor">
                            <label for="one">Editor  &emsp;</label>
                            <input type="checkbox" id="two" name="two" value="member">
                            <label for="two">Member  &emsp;</label>
                            <input type="checkbox" id="three" name="three" value="viewer">
                            <label for="three">Viewer</label>
                        </form>
                    <br> <br> <br>

                        <h4>Can be edited by</h4>
                        <form>
                            <input type="checkbox" id="admin" name="admin" value="administrator">
                            <label for="edit">Admin &emsp;</label>
                            <input type="checkbox" id="edit" name="edit" value="editor">
                            <label for="edit">Editor</label><br>
                        </form>
                     <br>



                <button type="submit"  name="submit" class="btn btn-warning bt-lg">&emsp; Next &emsp;</button>


                </div>
            </form>
            </div>
        </div>

</div>


                </div>
            </div>
        </div>
@endsection
