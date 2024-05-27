const publicationsData = [
    {
      title: "Publication 1",
      image: "",
      description: "Description de la publication 1",
    },
    {
      title: "Publication 2",
      image: "",
      description: "Description de la publication 2",
    },
    {
        title: "Publication 3",
        image: "",
        description: "Description de la publication 3",
      },
      
  ];
  
  // Sélectionnez la container des publications
  const publicationsContainer = document.querySelector('.publications-container');
  
  // Parcourez les données de publication et créez des cartes de publication
  publicationsData.forEach(publication => {
    const card = document.createElement('div');
    card.classList.add('publication-card');
    card.innerHTML = `
      <img src="${publication.image}" alt="${publication.title}">
      <h3>${publication.title}</h3>
      <p>${publication.description}</p>
    `;
    publicationsContainer.appendChild(card);
  });