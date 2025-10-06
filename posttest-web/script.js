const wisataCards = document.querySelectorAll(".card");

const modal = document.createElement("div");
modal.id = "modal-overlay";
document.body.appendChild(modal);

const modalContent = document.createElement("div");
modalContent.id = "modal-content";
modal.appendChild(modalContent);

const closeBtn = document.createElement("button");
closeBtn.textContent = "Tutup";
closeBtn.id = "modal-close-btn";
modalContent.appendChild(closeBtn);

closeBtn.addEventListener("click", () => {
  modal.classList.remove("modal-show");
});

wisataCards.forEach((card) => {
  card.addEventListener("click", () => {
    const title = card.querySelector("h3").textContent;
    const desc = card.querySelector("p")?.textContent || "Tidak ada deskripsi.";
    modalContent.innerHTML = `<h2>${title}</h2><p>${desc}</p>`;
    modalContent.appendChild(closeBtn);

    modal.classList.add("modal-show");
  });
});

const wisataSection = document.getElementById("wisata");
const searchContainer = document.createElement("div");
searchContainer.id = "search-container";

const searchBox = document.createElement("input");
searchBox.type = "text";
searchBox.placeholder = "🔍 Cari tempat wisata...";
searchBox.classList.add("search-box");

searchContainer.appendChild(searchBox);
wisataSection.insertBefore(searchContainer, wisataSection.children[1]);

searchBox.addEventListener("input", () => {
  const keyword = searchBox.value.toLowerCase();

  wisataCards.forEach((card) => {
    const title = card.querySelector("h3").textContent.toLowerCase();
    if (title.includes(keyword)) {
      card.classList.remove("hide");
    } else {
      card.classList.add("hide");
    }
  });

});
