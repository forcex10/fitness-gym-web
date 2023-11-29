#include <stdio.h>
#include <conio.h>
#include <windows.h>

#define SCREEN_WIDTH 80
#define SCREEN_HEIGHT 25
#define PADDLE_SIZE 5

int ballX, ballY;
int paddle1, paddle2;
int ballDirX, ballDirY;
int score1, score2;

void setup() {
    ballX = SCREEN_WIDTH / 2;
    ballY = SCREEN_HEIGHT / 2;
    paddle1 = SCREEN_HEIGHT / 2;
    paddle2 = SCREEN_HEIGHT / 2;
    ballDirX = -1;
    ballDirY = 1;
    score1 = 0;
    score2 = 0;
}

void draw() {
    system("cls"); // Efface l'écran
    
    int i, j;
    
    // Dessine les bords supérieur et inférieur
    for (i = 0; i < SCREEN_WIDTH; i++) {
        printf("#");
    }
    printf("\n");
    
    // Dessine le terrain de jeu
    for (i = 0; i < SCREEN_HEIGHT; i++) {
        for (j = 0; j < SCREEN_WIDTH; j++) {
            if (j == 0 || j == SCREEN_WIDTH - 1) {
                printf("#"); // Dessine les bords gauche et droit
            } else if (j == ballX && i == ballY) {
                printf("O"); // Dessine la balle
            } else if (j == 2 && i >= paddle1 && i < paddle1 + PADDLE_SIZE) {
                printf("|"); // Dessine la première raquette
            } else if (j == SCREEN_WIDTH - 3 && i >= paddle2 && i < paddle2 + PADDLE_SIZE) {
                printf("|"); // Dessine la deuxième raquette
            } else {
                printf(" "); // Dessine un espace vide
            }
        }
        printf("\n");
    }
    
    // Dessine les bords supérieur et inférieur
    for (i = 0; i < SCREEN_WIDTH; i++) {
        printf("#");
    }
    printf("\n");
    
    // Affiche le score
    printf("Score: %d - %d\n", score1, score2);
}

void input() {
    if (_kbhit()) { // Vérifie si une touche a été enfoncée
        char key = _getch();
        
        if (key == 'w' && paddle1 > 0) {
            paddle1--; // Déplace la première raquette vers le haut
        }
        if (key == 's' && paddle1 < SCREEN_HEIGHT - PADDLE_SIZE) {
            paddle1++; // Déplace la première raquette vers le bas
        }
        if (key == 'i' && paddle2 > 0) {
            paddle2--; // Déplace la deuxième raquette vers le haut
        }
        if (key == 'k' && paddle2 < SCREEN_HEIGHT - PADDLE_SIZE) {
            paddle2++; // Déplace la deuxième raquette vers le bas
        }
        if (key == 'q') {
            exit(0); // Quitte le jeu si la touche 'q' est enfoncée
        }
    }
}

void update() {
    ballX += ballDirX;
    ballY += ballDirY;
    
    // Vérifie les collisions avec les bords du terrain de jeu
    if (ballY <= 0 || ballY >= SCREEN_HEIGHT - 1) {
        ballDirY = -ballDirY; // Inverse la direction verticale de la balle
    }
    
    // Vérifie les collisions avec les raquettes
    if (ballX == 2 && ballY >= paddle1 && ballY < paddle1 + PADDLE_SIZE) {
        ballDirX = -ballDirX; // Inverse la direction horizontale de la balle
    }
    if (ballX == SCREEN_WIDTH - 3 && ballY >= paddle2 && ballY < paddle2 + PADDLE_SIZE) {
        ballDirX = -ballDirX; // Inverse la direction horizontale de la balle
    }
    
    // Vérifie les sorties de balle
    if (ballX < 0) {
        score2++;
        setup(); // Réinitialise le jeu
    }
    if (ballX >= SCREEN_WIDTH) {
        score1++;
        setup(); // Réinitialise le jeu
    }
}

int main() {
    setup(); // Initialise le jeu
    
    while (1) { // Bouclewhile (1) {
        draw(); // Dessine l'état actuel du jeu
        input(); // Gère les entrées du joueur
        update(); // Met à jour l'état du jeu
        
        // Ajoute un délai pour ralentir le jeu
        Sleep(10); // Attend pendant 10 millisecondes
    }
    
    return 0;
}