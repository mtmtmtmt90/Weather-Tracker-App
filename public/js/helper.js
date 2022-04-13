function loaderOn()
{
    document.querySelector('.loaderFrame').removeAttribute('hidden');
    document.querySelector('.innerOne').style = 'animation-play-state:running';
    document.querySelector('.innerTwo').style = 'animation-play-state:running';
    document.querySelector('.innerThree').style = 'animation-play-state:running';
}

function loaderOff()
{
    document.querySelector('.loaderFrame').setAttribute('hidden', '');
    document.querySelector('.innerOne').style = 'animation-play-state:paused';
    document.querySelector('.innerTwo').style = 'animation-play-state:paused';
    document.querySelector('.innerThree').style = 'animation-play-state:paused';
}
