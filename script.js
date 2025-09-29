const wisataCards = document.querySelectorAll(".card");

const modal = document.createElement("div");
modal.style.position = "fixed";
modal.style.top = "0";
modal.style.left = "0";
modal.style.width = "100%";
modal.style.height = "100%";
modal.style.background = "rgba(0,0,0,0.6)";
modal.style.display = "flex";
modal.style.alignItems = "center";
modal.style.justifyContent = "center";
modal.style.visibility = "hidden";
modal.style.opacity = "0";
modal.style.transition = "opacity 0.4s ease";
document.body.appendChild(modal);

const modalContent = document.createElement("div");
modalContent.style.background = "#fff";
modalContent.style.borderRadius = "15px";
modalContent.style.padding = "25px";
modalContent.style.maxWidth = "400px";
modalContent.style.textAlign = "center";
modalContent.style.boxShadow = "0 6px 20px rgba(0,0,0,0.2)";
modal.appendChild(modalContent);

const closeBtn = document.createElement("button");
closeBtn.textContent = "Tutup";
closeBtn.style.marginTop = "15px";
closeBtn.style.padding = "8px 16px";
closeBtn.style.border = "none";
closeBtn.style.borderRadius = "8px";
closeBtn.style.background = "#fb6f92";
closeBtn.style.color = "#fff";
closeBtn.style.cursor = "pointer";
modalContent.appendChild(closeBtn);

closeBtn.addEventListener("click", () => {
  modal.style.opacity = "0";
  setTimeout(() => (modal.style.visibility = "hidden"), 400);
});

wisataCards.forEach((card) => {
  card.addEventListener("click", () => {
    const title = card.querySelector("h3").textContent;
    const desc = card.querySelector("p")?.textContent || "Tidak ada deskripsi.";
    modalContent.innerHTML = `<h2 style="color:#ff8fab">${title}</h2><p>${desc}</p>`;
    modalContent.appendChild(closeBtn);

    modal.style.visibility = "visible";
    modal.style.opacity = "1";
  });
});

const wisataSection = document.getElementById("wisata");
const searchContainer = document.createElement("div");
searchContainer.style.position = "relative";
searchContainer.style.maxWidth = "450px";
searchContainer.style.margin = "20px auto";
searchContainer.style.width = "100%";

const searchBox = document.createElement("input");
searchBox.type = "text";
searchBox.placeholder = "🔍 Cari tempat wisata...";
searchBox.classList.add("search-box");
searchBox.style.paddingLeft = "35px"; 

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

setTimeout(() => {
  newParagraph.style.opacity = "1";
  newParagraph.style.transform = "translateY(0)";
}, 500);