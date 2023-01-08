'use strict';

//elements

const navAbout = document.querySelector('.navAbout');
const navCreateAccount = document.querySelector('.navCA');
const navLogin = document.querySelector('.navLogin');
const navContact = document.querySelector('.navCon');
const aboutButton = document.querySelector('.about_button');
const navLink = document.querySelector('.nav-link');

navLink.addEventListener('click', function (e) {
  e.preventDefault();

  if (e.target.classList.contains('nav-item')) {
    const id = e.target.getAttribute('href');
    document.querySelector(id).scrollIntoView({ behavior: 'smooth' });
  }
});

document.querySelector('.about_button').addEventListener('click', function (e) {
  e.preventDefault();

  if (e.target.classList.contains('about_button')) {
    const id = e.target.getAttribute('href');
    document.querySelector(id).scrollIntoView({ behavior: 'smooth' });
  }
});

window.onbeforeunload = function () {
  window.scrollTo(0, 0);
};
const header = document.querySelector('.header');
const navHeight = nav.getBoundingClientRect().height;

const stickyNav = function (entries) {
  const [entry] = entries;
  // console.log(entry);

  if (!entry.isIntersecting) nav.classList.add('sticky');
  else nav.classList.remove('sticky');
};

const headerObserver = new IntersectionObserver(stickyNav, {
  root: null,
  threshold: 0,
  rootMargin: `-${navHeight}px`,
});

headerObserver.observe(header);
