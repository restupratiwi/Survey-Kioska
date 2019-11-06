const smile = document.getElementById('smile');
const neutral = document.getElementById('neutral');
const frown = document.getElementById('frown');
const options = [smile, neutral, frown];

const bboxes = options.map(o => ({
  smiley: o,
  bbox: o.getBBox()
}));

let selection = null;

function select(on, off) {
  if (selection)
    return;
  
  selection = on;
  
  const tl = new TimelineMax(); 
  tl.addLabel("start");
 
  tl.staggerTo(off, 0.5, {
    opacity: 0
  })
  
  tl.to(on, 0.05, {
    scale: 1.25,
    transformOrigin: 'center'
  }, "start");
  
  const bb = on.getBBox();
  
  tl.to(on, 0.5, {
    scale: 0.5,
    x: -bb.x,
    y: 0
  }, "-=0.45");
  
  tl.to("#comments", 0.2, { opacity: 1, visibility: 'visible' }, "-=0.2");
  
  tl.eventCallback('onComplete', () => 
    document.getElementById('comments-input').focus());
}

options.forEach(option =>
  option.addEventListener('click', () => select(option,       options.filter(o => o !== option))));

document.getElementById('btnChange').addEventListener('click', () => {
  const tl = new TimelineMax();
  tl.addLabel("start");
  
  tl.to('#comments', 0.1, { opacity: 0, visibility: 'hidden' });

  bboxes.forEach(b => {
    tl.to(b.smiley, 0.5, {
      opacity: 1,
      scale: 1,
      x: b.bbox.x - b.smiley.getBBox().x
    }, "start")
  });
  
  tl.eventCallback('onComplete', () => selection = null);
})


function sendFeedback() {
  const tl = new TimelineMax();
  tl.addLabel('start');
  tl.to('#comments', 0.5, {
    scaleY: 0.25,
  });
  tl.to([selection, '#comments'], 1, {
    x: window.innerWidth,
    ease: Power2.easeIn
  }, 'start');
  tl.set([selection, '#comments'], {
    visibility: 'hidden',
    x: 0,
    left: 0
  });
  tl.to(['#checkmark', '#thank-you'], 0.5, {
    opacity: 1,
    visibility: 'visible'
  }, '-=0.5');
}

document.getElementById('btnSubmit').addEventListener('click', sendFeedback);