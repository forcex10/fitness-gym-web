<!DOCTYPE html>

<style>
    /* Scroll down for CSS Grid rules */

html {
  height: 100%;
  box-sizing: border-box;
}

body {
  position: relative;
  min-height: 100%;
  font-family: "Montserrat", sans-serif;
  padding-bottom: 8rem;
  margin: -10px -10px 0 -10px;
  background-color: snow;
}

article {
  height: 100%;
}

.image {
  background-image: url("https://images.unsplash.com/photo-1516571137133-1be29e37143a?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=98feb08eaacddba8c029c8b5298ca3a0");
  background-size: cover;
}

.headline {
  background-color: saddlebrown;
  color: navajowhite;
  padding: 0.75rem;
  text-align: center;
  box-shadow: 0 1.2em 0 0.75em;
}

.headline p {
  font-size: 1.25em;
}
.headline h1 {
  margin-top: -0.25em;
  margin-bottom: 0.5em;
  font-size: 3em;
  text-transform: uppercase;
  line-height: 1;
  text-shadow: 3px 3px 0px #3e2723;
}

.byline {
  margin: 0 1rem 1rem 1rem;
  font-family: "Libre Baskerville", serif;
  font-style: italic;
  letter-spacing: -0.2px;
}

.article-text {
  margin: -1em auto;
  padding: 0.5em 1em;
  max-width: 620px;
  font-size: 1em;
  line-height: 1.25;
  color: #3e2723;
}

.first::first-letter {
  float: left;
  margin: 0 0.2em 0 0;
  color: saddlebrown;
  font-size: 4em;
  font-family: "Libre Baskerville", serif;
  font-weight: 600;
  text-shadow: 2px 2px 0px #3e2723;
}

footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: saddlebrown;
  color: navajowhite;
  text-align: center;
}

/* CSS Grid starts here! */

.article-header {
  display: grid;
  grid-template-columns: 1fr 4fr 1fr;
  grid-template-rows: 2fr 1fr 1fr 1fr;
}

.image {
  grid-column: 1 / -1;
  grid-row: 1 / 3;
}
.headline {
  grid-column: 2 / 3;
  grid-row: 2 / 4;
  z-index: 100;
}

    </style>
<main>
  <article>
    <div class="article-header">
      <div class="headline">
        <p>The Sights & Sounds of</p>
        <h1>Our National Parks</h1>
        <div class="byline">by Cortney Drummond</div>
      </div>
      <div class="image"></div>
    </div>
    <div class="article-text">
      <p class="first">A song can make or ruin a person’s day if they let it get to them. They got there early, and they got really good seats. If the Easter Bunny and the Tooth Fairy had babies would they take your teeth and leave chocolate for you? I think I will buy the red car, or I will lease the blue one. The lake is a long way from here.</p>
      <p>He turned in the research paper on Friday; otherwise, he would have not passed the class. Wednesday is hump day, but has anyone asked the camel if he’s happy about it? Let's all be unique together until we realize we are all the same.</p>
      <p>I think I will buy the red car, or I will lease the blue one.</p>
    </div>
  </article>
</main>
<footer>An exercise in <strong>CSS Grid</strong> (and drop caps)</footer>
</html>

