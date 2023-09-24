/*
 * Versão 1.0 por Guardian, 20/09/2023
 */


setTimeout(function () {
  var disqus = document.querySelector('#disqus_thread');

  if (disqus) {
    var adEncontrado = false;

    const removead = () => {
      let ad = disqus.querySelector('iframe');
      if (ad) {
        ad.remove();
        adEncontrado = true;
      } else {
        setTimeout(removead, 1000);
      }
    };

    setTimeout(function () {
      removead();
    }, 2000);
  }
}, 2000);