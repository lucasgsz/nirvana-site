let fillbar = document.querySelector(".fill");
let audios = ["Smells_Like.mp3", "Lithium.mp3", "Heart_Shaped.mp3"];
let currentTime = document.querySelector(".time");

// Variavel audio = objeto

let audio = new Audio();
let currentSong = 0;

// funcao para rodar a musica

function playSong() {
  audio.src = audios[currentSong];
  audio.play();
}

//funcao play e pause
function togglePlayPause() {
  if (audio.paused) {
    playSong();
    let playBtn = document.querySelector(".play-pause");
    console.log('play');
    playBtn.innerHTML = '<i class="fa fa-pause"></i>';
  } else {
    audio.pause();
     playBtn = document.querySelector(".play-pause");
     console.log('pause');
    playBtn.innerHTML = '<i class="fa fa-play"></i>';
  }
}

//barra de progresso
audio.addEventListener("timeupdate", function() {
  let position = audio.currentTime / audio.duration;
  fillbar.style.width = position * 100 + "%";
  if (audio.ended) {
    nextAudio();
  }
});


//botoes de proxima e voltar musica
function nextAudio() {
  currentSong++;
  if (currentSong > 2) {
    currentSong = 0;
  }
  playSong();
  playBtn = document.querySelector(".play-pause");
  playBtn.innerHTML = '<i class="fa fa-pause"></i>';
}
function prevAudio() {
  currentSong--;
  if (currentSong < 0) {
    currentSong = 2;
  }
  playSong();
  playBtn = document.querySelector(".play-pause");
  playBtn.innerHTML = '<i class="fa fa-pause"></i>';
  playBtn.style.paddingLeft = "30px";
}

