<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="createpost">
        <div class="create-post">

            <div class="user-profile">
                <img src="{{ auth()->user()->profile ? asset('storage') . '/' . auth()->user()->profile : '../images/icons/user.png' }}"
                    alt="User Profile">
                <h3>{{ auth()->user()->name }}</h3>
            </div>

            <style>
                .upload-btn-wrapper {
                    position: relative;
                    overflow: hidden;
                    display: inline-block;
                }

                .upload-btn-wrapper input[type=file] {
                    font-size: 100px;
                    position: absolute;
                    left: 0;
                    top: 0;
                    opacity: 0;
                }
            </style>
            <div class="post-input">
                <textarea wire:model.lazy="content" name="content" placeholder="Qu'est-ce qui vous passe par la tête ?" required></textarea>
                @error('content')
                    <span class="error">{{ $message }}</span>
                @enderror
                <div wire:loading wire:target="images">Uploading ....</div>
                <div wire:loading wire:target="video">Uploading ....</div>
                @if ($images)
                    @foreach ($images as $image)
                        <img src="{{ $image->temporaryUrl() }}" alt="" width="100px">
                    @endforeach
                @endif
                @if ($video)
                    <video src="{{ $video->temporaryUrl() }}" alt="" width="width:100%; height:100%"> </video>
                    <br>
                @endif
                <div class="post-comb" style="display: flex; font-size:18px">
                    <div class="post-options">
                        <button class="upload-btn-wrapper">
                            <img src="../images/icons/photo.png"> Image
                            <input wire:model="images" type="file" name="images" multiple>
                        </button>
                        <button class="upload-btn-wrapper">
                            <img src="../images/icons/video.png"> Vidéo
                            <input wire:model="video" type="file" name="video">
                        </button>
                    </div>
                    <button class="post-btn" style="margin-left: 60%; display:flex; padding:0px 10px" type="submit">
                        <img src="../images/icons/send.png"> Publier
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
