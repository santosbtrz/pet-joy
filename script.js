/* CARROSSEL - PRINCIPAL */

function toggleMenu() {
  const menuMobile = document.getElementById("menu-mobile");
  if (menuMobile.style.display === "flex") {
    menuMobile.style.display = "none";
  } else {
    menuMobile.style.display = "flex";
  }
}

/* CARROSSEL - CATEGORIAS */

document.addEventListener("DOMContentLoaded", () => {
  const wrapper = document.querySelector(".carousel-wrapper");
  const items = document.querySelectorAll(".ctn-circle");
  const prevButton = document.querySelector(".prev");
  const nextButton = document.querySelector(".next");

  if (!wrapper || !items.length || !prevButton || !nextButton) {
    console.error("Um ou mais elementos não foram encontrados.");
    return;
  }

  let currentIndex = 0;

  function updateCarousel() {
    const container = document.querySelector(".ctn-carousel");
    if (!container) {
      console.error("Elemento .ctn-carousel não foi encontrado.");
      return;
    }

    const containerWidth = container.offsetWidth;
    const itemWidth =
      items[0].offsetWidth +
      parseInt(window.getComputedStyle(items[0]).marginRight);

    const bufferItems = 1;
    const maxIndex =
      items.length - Math.floor(containerWidth / itemWidth) + bufferItems;

    const offset = -currentIndex * itemWidth;
    wrapper.style.transform = `translateX(${offset}px)`;

    prevButton.style.display = currentIndex === 0 ? "none" : "block";
    nextButton.style.display = currentIndex >= maxIndex ? "none" : "block";
  }

  nextButton.addEventListener("click", () => {
    const containerWidth = document.querySelector(".ctn-carousel").offsetWidth;
    const itemWidth =
      items[0].offsetWidth +
      parseInt(window.getComputedStyle(items[0]).marginRight);
    const bufferItems = 1;
    const maxIndex =
      items.length - Math.floor(containerWidth / itemWidth) + bufferItems;

    if (currentIndex < maxIndex) {
      currentIndex++;
      updateCarousel();
    }
  });

  prevButton.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  });

  updateCarousel();

  window.addEventListener("resize", updateCarousel);
});

document.addEventListener("DOMContentLoaded", () => {
  const wrapper = document.querySelector(".carousel-wrapper");
  const items = document.querySelectorAll(".prod-card");
  const prevButton = document.querySelector(".prev");
  const nextButton = document.querySelector(".next");

  if (!wrapper || !items.length || !prevButton || !nextButton) {
    console.error("Um ou mais elementos não foram encontrados.");
    return;
  }

  let currentIndex = 0;

  function updateCarousel() {
    const container = document.querySelector(".ctn-carousel");
    if (!container) {
      console.error("Elemento .ctn-carousel não foi encontrado.");
      return;
    }

    const containerWidth = container.offsetWidth;
    const itemWidth =
      items[0].offsetWidth +
      parseInt(window.getComputedStyle(items[0]).marginRight);

    const bufferItems = 1; // Número de itens adicionais para o buffer
    const maxIndex =
      items.length - Math.floor(containerWidth / itemWidth) + bufferItems;

    const offset = -currentIndex * itemWidth;
    wrapper.style.transform = `translateX(${offset}px)`;

    prevButton.style.display = currentIndex === 0 ? "none" : "block";
    nextButton.style.display = currentIndex >= maxIndex ? "none" : "block";
  }

  nextButton.addEventListener("click", () => {
    const containerWidth = document.querySelector(".ctn-carousel").offsetWidth;
    const itemWidth =
      items[0].offsetWidth +
      parseInt(window.getComputedStyle(items[0]).marginRight);
    const bufferItems = 1; // Número de itens adicionais para o buffer
    const maxIndex =
      items.length - Math.floor(containerWidth / itemWidth) + bufferItems;

    if (currentIndex < maxIndex) {
      currentIndex++;
      updateCarousel();
    }
  });

  prevButton.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  });

  updateCarousel();

  window.addEventListener("resize", updateCarousel);
});

/* PRODUTOS EM DESTAQUE ESPECÍFICOS */

document.addEventListener("DOMContentLoaded", function () {
  function filterProducts(event, category) {
    var target = event.target;
    var cards = document.querySelectorAll(".prod-card");
    var buttons = document.querySelectorAll(".btn-dest");

    if (!target || !cards.length || !buttons.length) {
      console.error("Elementos não encontrados no DOM.");
      return;
    }

    cards.forEach(function (card) {
      if (category === "all" || card.classList.contains(category)) {
        card.classList.add("show");
      } else {
        card.classList.remove("show");
      }
    });

    buttons.forEach(function (button) {
      button.classList.remove("active");
    });

    target.classList.add("active");
  }

  window.filterProducts = filterProducts;

  filterProducts({ target: document.querySelector(".btn-dest") }, "all");
});

function redirecionar() {
  window.location.href = "index.php";
}

document.addEventListener("DOMContentLoaded", function () {
  function showConditions() {
    document.getElementById("password-conditions").style.display = "block";
  }

  function hideConditions() {
    setTimeout(() => {
      document.getElementById("password-conditions").style.display = "none";
    }, 100);
  }

  function validatePassword() {
    const password = document.getElementById("senha").value;
    const minLength = document.getElementById("min-length");
    const uppercase = document.getElementById("uppercase");
    const lowercase = document.getElementById("lowercase");

    if (password.length >= 8) {
      minLength.classList.add("valid");
    } else {
      minLength.classList.remove("valid");
    }

    if (/[A-Z]/.test(password)) {
      uppercase.classList.add("valid");
    } else {
      uppercase.classList.remove("valid");
    }

    if (/[a-z]/.test(password)) {
      lowercase.classList.add("valid");
    } else {
      lowercase.classList.remove("valid");
    }
  }

  const senhaInput = document.getElementById("senha");
  senhaInput.addEventListener("focus", showConditions);
  senhaInput.addEventListener("blur", hideConditions);
  senhaInput.addEventListener("input", validatePassword);

  const mostrarSenhaButton = document.getElementById('mostrarSenha');
  mostrarSenhaButton.addEventListener('click', function () {
    if (senhaInput.type === 'password') {
      senhaInput.type = 'text';
      mostrarSenhaButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
      senhaInput.type = 'password';
      mostrarSenhaButton.innerHTML = '<i class="fas fa-eye"></i>';
    }
  });
});

document.querySelectorAll('.lista-categorias li a').forEach((link) => {
  link.addEventListener('click', (event) => {
    event.preventDefault();

    const selectedCategory = link.textContent.trim().toLowerCase();

    if (selectedCategory === "ver tudo") {
      document.querySelectorAll('.prod-card').forEach((card) => {
        card.style.display = 'flex';
      });
    } else {
      document.querySelectorAll('.prod-card').forEach((card) => {
        const cardCategory = card.getAttribute('data-category').toLowerCase();

        if (selectedCategory === cardCategory) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }
  });
});

document.querySelectorAll('.ctt-categorias li').forEach(function (item) {
  item.addEventListener('click', function () {
    const newSrc = item.getAttribute('data-banner-src');
    if (newSrc) {
      document.getElementById('categoria-banner').src = newSrc;
    }
  });
});

document.getElementById('ver-tudo').addEventListener('click', function () {
  document.getElementById('categoria-banner').src = 'images/todas-categorias.png';
});










