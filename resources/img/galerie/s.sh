#!/bin/bash

# Définir le chemin de l'image source
source_image="image1.png"

# Années de début et de fin
year_start=2010
year_end=2024

# Listes des équipes
teams=("SENIORAM" "SENIORBM" "SENIORCM" "SENIORF" "U17AM" "U17BM" "U17F" "U15M" "U15F" "U13M" "U11M" "U11F" "U9M" "U9F" "AUTRES")

# Nombre total de copies à faire
total_copies=50

# Boucle pour les copies
for ((copy=1; copy<=$total_copies; copy++)); do
    # Choix aléatoire d'une équipe
    team_index=$(( RANDOM % ${#teams[@]} ))
    selected_team="${teams[$team_index]}"
    # Choix aléatoire d'une année
    selected_year=$(( RANDOM % ($year_end - $year_start + 1) + $year_start ))
    # Créer le nom de fichier incrémental
    filename="image$copy.png"
    # Chemin complet de destination
    destination="$selected_year/$selected_team/$filename"
    # Créer le répertoire s'il n'existe pas déjà
    mkdir -p "$(dirname "$destination")"
    # Copier l'image source vers la destination
    cp "$source_image" "$destination"
    echo "Copie de $source_image vers $destination"
done
