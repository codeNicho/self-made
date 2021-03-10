/* *****************************************************************************************************
   *                            PLEASE READ!                                                           *
   * An admin system was implemented for proper testing abilities                                      *
   * The Admin ID is 1234 and Password "cmp1024" they are both hardcoded in the admins structure below.*
   * Use both the ID and Password to login at the login screen
   *****************************************************************************************************
*/
#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
#include <conio.h>
#include <windows.h>
#include <dos.h>
#define SIZE 30

//ADMIN ID AND PASSWORD ARE 1234 AND CMP1024 RESPECTIVELY, WHICH ARE HARDCODED IN THE ADMINS STRUCTURE BELOW

//Global Variables
int adminEntered=0, InvalidRating=0, InvalidDollarVal=0,InvalidJobTitle=0, InvalidDay=0;

//FUNCTIONS PROTOTYPES
void AddSong(void);
void AddEmployee(void);
void AddProducer(void);
void UpdateSong(void);
void UpdateEmployee(void);
void SearchSong(void);
void SearchProducer(void);
void SearchEmployee(void);
void SearchRoyaltyReport(void);
void GenerateSetList(void);
void InitiateSetList(void);
void printAllEmpRec(void);
void printAllSongs(void);
void printAllProducers(void);
void ValidateLogin(void);
void MainMenu(void);
void DjMenu(void);
void DisplayLogo(void);


//MINOR CHECKING FUNCTION PROTOTYPES
void CheckDay(void);//FUNCTION USED TO ERROR CHECK DAY ENTERED(SHOULD BE 1-31 SINCE A MONTH HAS 31 DAYS)
void CheckRating(void); //FUNCTION USED TO CHECK THE RATING ENTERED
void CheckTitle(void);//FUNCTION USED TO ERROR CHECK FOR JOB TITLE ENTERED
void CheckAvailableId(void);//FUNCTION USED TO ADD ID NUMBER INCREMENTALLY FOR EMPLOYEE RECORDS
void CheckAvailableId2(void);//FUNCTION USED TO ADD ID NUMBER INCREMENTALLY FOR SONG RECORDS
void CheckValue(void); //FUNCTION USED TO CHECK IF CORRECT RANGE OF VALUE IS ENTERED FOR SONG COST

//MINOR FUNCTIONS USED TO IMPLEMENT SPECIFIC VARIABLE FILE SEARCHING
void SearchById(void);
void SearchByTitle(void);
void SearchByProdName(void);
void SearchByPerformName(void);
void SearchByWriterName(void);

//FUNCTION ASSOCIATED WITH THE ADMIN LOGIN CREDENTIALS
void AdminLogin(void);




//FILE POINTER DECLARATIONS
FILE *fpemp;
FILE *empIncrement;
FILE *fsongs;
FILE *songsIncrement;
FILE *fproducers;
FILE *froyalties;
FILE *fLogin;
FILE *fmonthrev;
FILE *fsophomore;
FILE *fjunior;
FILE *fsenior;
FILE *alogin;
FILE *updateSongs;
FILE *updateEmploy;


//STRUCTURE DECLARATIONS
typedef struct prod{
    int id;
    char prodfName[SIZE];
    char prodlName[SIZE];
    char prodCompany[SIZE];
    char prodEmail[SIZE];
    char  prodTele[SIZE];

}PRODUCERS;
PRODUCERS producers = {0,"","","","",0};

typedef struct adminss{
     int id;
     char password[SIZE];
}ADMINS;
ADMINS admins={1234,"CMP1025"};


typedef struct songss{
    int id;
    char title[SIZE];
    char prodfName[SIZE];
    char prodlName[SIZE];
    char writerfName[SIZE];
    char writerlName[SIZE];
    char performerfName[SIZE];
    char performerlName[SIZE];
    char releaseDate[SIZE];
    char rating[SIZE];
    float dollarVal;
}SONGS;
SONGS songs={0,"","","","","","","","","",0.0};


typedef struct sen{
    int id;
    char title[SIZE];
    char prodfName[SIZE];
    char prodlName[SIZE];
    char writerfName[SIZE];
    char writerlName[SIZE];
    char performerfName[SIZE];
    char performerlName[SIZE];
    char releaseDate[SIZE];
    char rating[SIZE];
    float dollarVal;
}SENIORS;
SENIORS senior={0,"","","","","","","","","",0.0};

typedef struct jun{
    int id;
    char title[SIZE];
    char prodfName[SIZE];
    char prodlName[SIZE];
    char writerfName[SIZE];
    char writerlName[SIZE];
    char performerfName[SIZE];
    char performerlName[SIZE];
    char releaseDate[SIZE];
    char rating[SIZE];
    float dollarVal;
}JUNIORS;
JUNIORS junior={0,"","","","","","","","","",0.0};

typedef struct sopho{
    int id;
    char title[SIZE];
    char prodfName[SIZE];
    char prodlName[SIZE];
    char writerfName[SIZE];
    char writerlName[SIZE];
    char performerfName[SIZE];
    char performerlName[SIZE];
    char releaseDate[SIZE];
    char rating[SIZE];
    float dollarVal;
}SOPHOMORES;
SOPHOMORES sophomore={0,"","","","","","","","","",0.0};

typedef struct monrev{
    float monthlyRev;
}MONTHREV;
MONTHREV monthrev={0.0};


typedef struct roys{
    int prodID;
    float prodWallet;

}ROYALTIES;
ROYALTIES royalties={0,0.0};

typedef struct logins{
    int id;
    char passWord[SIZE];
    char title[SIZE];
}Login;

Login login = {0,"",""};

typedef struct employ{  //EMPLOYEES STRUCTURE
    int id;
    char fName[SIZE];
    char lName[SIZE];
    char jTitle[SIZE];
    char monthEmp[SIZE];
    char passWord[SIZE];
    int dayEmp;
    int yearEmp;
    int yOB;
}EMPLOYEES;

EMPLOYEES emp = {0,"","","","","",0,0,0};//INITIALIZING EMPLOYEES STRUCTURE ELEMENTS

typedef struct incre{
    int increment;
}EMPINCREMENT;

EMPINCREMENT incrementVar;

typedef struct songincre{
    int increment2;

}SONGINCREMENT;
SONGINCREMENT  incrementVar2;

int main()
{
    ValidateLogin();

    return 0;
}


void AddSong(void)
{
    fsongs = fopen("songs.dat", "ab");
    if(fsongs==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
    CheckAvailableId2();
        fflush(stdin);
        SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 10);
        printf("Enter the song title(without spaces):\n");
        scanf("%s", songs.title);
        strupr(songs.title);

        printf("Enter the Producer's First Name:\n");
        scanf("%s",songs.prodfName);
        strupr(songs.prodfName);

        printf("Enter the Producer's Last Name\n");
        scanf("%s", songs.prodlName);
        strupr(songs.prodlName);

        printf("Enter the writer of the song's First Name\n");
        scanf("%s", songs.writerfName);
        strupr(songs.writerfName);

        printf("Enter the writer of the song's Last Name\n");
        scanf("%s", songs.writerlName);
        strupr(songs.writerlName);


        printf("Enter the performer of the song's First Name\n");
        scanf("%s", songs.performerfName);
        strupr(songs.performerfName);

        printf("Enter the performer of the song's Last Name\n");
        scanf("%s", songs.performerlName);
        strupr(songs.performerlName);

        printf("Enter the release date of the song with no spaces e.g.(DDMMYYYY)\n");
        scanf("%s",&songs.releaseDate);

        rating:
        InvalidRating=0;
        printf("Enter the rating of the song[RAW or CLEAN]\n");
        scanf("%s", songs.rating);
        strupr(songs.rating);//CONVERTING STRING TO UPPERCASE
        CheckRating();
        if(InvalidRating==1)
        {
            goto rating;
        }

        dollarvalue:
        InvalidDollarVal=0;
        printf("Enter the value(cost) of the song \n");
        scanf("%f",&songs.dollarVal);
        CheckValue();
        if(InvalidDollarVal==1)
        {
            goto dollarvalue;
        }

       fwrite(&songs, sizeof(SONGS), 1, fsongs);

       printf("Please Hold, Creating Song Memory...");
            Sleep(1000);
            system("cls");
            printf("Accepting Data....");
            Sleep(50);
            system("cls");
            printf("Enabling Data De-Fragmentation.....");
            Sleep(50);
            system("cls");
            printf("Organizing File Memory...");
            Sleep(50);
            system("cls");
            printf("Initiating Data Logs...");
            Sleep(50);
            system("cls");
            printf("Data Checking...");
            Sleep(50);
            system("cls");
            printf("Initializing Validity Check...");
            Sleep(50);
            system("cls");
            printf("Locating Record Addresses..");
            Sleep(50);
            system("cls");
            printf("Initiating Data Storage...");
            Sleep(50);
            system("cls");
            printf("Please wait, Finalizing DataBase Entry...");
            Sleep(2000);
            system("cls");
            SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 13);




       printf("Song added successfully to vault!\n");
    }
    fclose(fsongs);
    AddProducer();
}
void AddEmployee(void)
{
    char decision = 'y';

    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 10);
    fpemp = fopen("employee.dat", "ab");
    if(fpemp==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        CheckAvailableId();
        fflush(stdin);
        printf("Enter Employee's First Name:\n");
        scanf("%s", emp.fName);

        printf("Enter Employee's Last Name:\n");
        scanf("%s",emp.lName);

        printf("Enter a login password\n");
        scanf("%s", emp.passWord);
        strupr(emp.passWord);

        jobtitle:
        InvalidJobTitle=0;
        printf("Enter the Employee's job position [DJ or Manager]\n");
        scanf("%s", emp.jTitle);
        strupr(emp.jTitle);      //CONVERTING STRING TO UPPERCASE
        CheckTitle();           //CHECKING IF STRING ENTERED IS VALID OR NOT
        if(InvalidJobTitle==1)
        {
            goto jobtitle;
        }




        printf("Enter the name of the month of employment e.g. January\n");
        scanf("%s", emp.monthEmp);

        checkday:
        InvalidDay=0;
        printf("Enter the day of employment [1-31]\n");
        scanf("%d",&emp.dayEmp);
        CheckDay();
        if(InvalidDay==1)
        {
            goto checkday;
        }

        printf("Enter the year of employment \n");
        scanf("%d",&emp.yearEmp);

        printf("Enter the Employee's year of birth\n");
        scanf("%d",&emp.yOB);

        fwrite(&emp, sizeof(EMPLOYEES), 1, fpemp);

       printf("Record process complete\n");
       printf("Your Record information is stated below\n");
       printf("record found\n");
       printf("Id number: %d\n", emp.id);
       printf("First Name: %s\n", emp.fName);
       printf("Last Name: %s\n", emp.lName);
       printf("Password: %s\n", emp.passWord);
       printf("Job Title: %s\n", emp.jTitle);
       printf("Month Employed: %s\n", emp.monthEmp);
       printf("Day of the Month Employed: %d\n", emp.dayEmp);
       printf("Year Employed: %d\n", emp.yearEmp);
       printf("Year of Birth: %d\n", emp.yOB);
                    fflush(stdin);

        fLogin=fopen("login.dat", "ab");
        if(fLogin==NULL)
        {
            printf("Error opening file\n");
        }
        else
        {
            login.id = emp.id;
            strcpy(login.passWord,emp.passWord);
            strcpy(login.title,emp.jTitle);
            fwrite(&login, sizeof(Login),1,fLogin);
        }
        fclose(fLogin);



       printf("Press any key to return to the main menu\n");
       getch();
       MainMenu();
    }
    fclose(fpemp);
}
void UpdateSong(void)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 10);
    int id, keepid, found=0;
    fsongs = fopen("songs.dat", "rb+");
    if(fsongs==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        updateSongs=fopen("songstemp.dat","ab");
        if(updateSongs==NULL)
        {
            printf("Error opening file\n");
        }
        else
        {
            printf("Enter the ID number for the song you wish to update\n");
            scanf("%d", &id);
            rewind(fsongs);
            while(fread(&songs, sizeof(SONGS), 1, fsongs)==1)
            {
                if(id==songs.id)
                    {
                        found=1;
                        printf("Record Found\n");
                        keepid=songs.id;
                        fflush(stdin);
                        songs.id=keepid;
                        printf("Enter the new song title(without spaces):\n");
                        scanf("%s", songs.title);
                        strupr(songs.title);

                        printf("Enter the Producer's First Name:\n");
                        scanf("%s",songs.prodfName);
                        strupr(songs.prodfName);

                        printf("Enter the Producer's Last Name\n");
                        scanf("%s", songs.prodlName);
                        strupr(songs.prodlName);

                        printf("Enter the writer of the song's First Name\n");
                        scanf("%s", songs.writerfName);
                        strupr(songs.writerfName);

                        printf("Enter the writer of the song's Last Name\n");
                        scanf("%s", songs.writerlName);
                        strupr(songs.writerlName);


                        printf("Enter the performer of the song's First Name\n");
                        scanf("%s", songs.performerfName);
                        strupr(songs.performerfName);

                        printf("Enter the performer of the song's Last Name\n");
                        scanf("%s", songs.performerlName);
                        strupr(songs.performerlName);

                        printf("Enter the release date of the song with no spaces e.g.(DDMMYYYY)\n");
                        scanf("%s",&songs.releaseDate);

                        printf("Enter the rating of the song[RAW or CLEAN]\n");
                        scanf("%s", songs.rating);
                        strupr(songs.rating);//CONVERTING STRING TO UPPERCASE

                        rating:
                        CheckRating();
                        if(InvalidRating==1)
                        {
                            goto rating;
                        }

                        printf("Enter the new value(cost) of the song \n");
                        scanf("%f",&songs.dollarVal);
                        CheckValue();
                        fwrite(&songs, sizeof(SONGS), 1, updateSongs);
                    }
                else
                    {
                        fwrite(&songs, sizeof(SONGS), 1, updateSongs);
                    }
            }
        }
    }

    fclose(fsongs);
    fclose(updateSongs);

    if(found!=1)
        {
            printf("The record was not found\n");
        }
    if(remove("songs.dat")==0)
     {
        printf("FILE DELETED SUCCESSFULLY\n");
     }
    else
     {
       printf("ERROR WHILE DELETING THE FILE\n");
     }

    if(rename("songstemp.dat","songs.dat")==0)
     {
             printf("FILE RENAMED SUCCESSFULLY\n");
     }
   else
    {
             printf("ERROR WHILE RENAMING THE FILE\n");
    }

       printf("Press any key to return to the main menu\n");
       getch();
       MainMenu();
}
void UpdateEmployee(void)
{
    int id, keepid, found=0;
    fpemp = fopen("employee.dat", "rb+");
    if(fpemp==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        updateEmploy=fopen("employtemp.dat","ab");
        if(updateEmploy==NULL)
        {
            printf("Error opening file\n");
        }
        else
        {
            printf("Enter the ID number for the employee you wish to update\n");
            scanf("%d", &id);
            rewind(fpemp);
            while(fread(&emp, sizeof(EMPLOYEES), 1, fpemp)==1)
            {
                if(id==emp.id)
                    {
                        found=1;
                        printf("Record Found\n");
                        keepid=emp.id;
                        fflush(stdin);
                        emp.id=keepid;

                        printf("Enter Employee's First Name:\n");
                        scanf("%s", emp.fName);

                        printf("Enter Employee's Last Name:\n");
                        scanf("%s",emp.lName);

                        printf("Enter a login password\n");
                        scanf("%s", emp.passWord);
                        strupr(emp.passWord);

                        jobtitle2:
                        printf("Enter the Employee's job position [DJ or Manager]\n");
                        scanf("%s", emp.jTitle);
                        strupr(emp.jTitle);      //CONVERTING STRING TO UPPERCASE
                        InvalidJobTitle=0;
                        CheckTitle();           //CHECKING IF STRING ENTERED IS VALID OR NOT
                        if(InvalidJobTitle==1)
                        {
                            goto jobtitle2;
                        }

                        printf("Enter the name of the month of employment e.g. January\n");
                        scanf("%s", emp.monthEmp);

                        invalidday2:
                        InvalidDay=0;
                        printf("Enter the day of employment [1-31]\n");
                        scanf("%d",&emp.dayEmp);
                        CheckDay();
                        if(InvalidDay==1)
                        {
                            goto invalidday2;
                        }

                        printf("Enter the year of employment \n");
                        scanf("%d",&emp.yearEmp);

                        printf("Enter the Employee's year of birth\n");
                        scanf("%d",&emp.yOB);

                        fwrite(&emp, sizeof(EMPLOYEES), 1, updateEmploy);
                    }
                else
                    {
                        fwrite(&emp, sizeof(EMPLOYEES), 1, updateEmploy);
                    }

            }
        }
    }

        if(found!=1)
        {
            printf("The record was not found\n");
        }
    fclose(fpemp);
    fclose(updateEmploy);

    if(remove("employee.dat")==0)
     {
        printf("FILE DELETED SUCCESSFULLY\n");
     }
    else
     {
       printf("ERROR WHILE DELETING THE FILE\n");
     }

    if(rename("employtemp.dat","employee.dat")==0)
     {
             printf("FILE RENAMED SUCCESSFULLY\n");
             printf("Press enter to return to main menu\n");
             getch();
     }
   else
    {
             printf("ERROR WHILE RENAMING THE FILE\n");
             printf("Press enter to return to main menu\n");
             getch();
    }

       printf("Press any key to return to the main menu\n");
       getch();
       MainMenu();
}
void SearchSong(void)
{
    int idnum,found, option;
    fsongs = fopen("songs.dat", "rb");
    if(fsongs==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        printf("Enter the corresponding number to the desired action\n\n");
        printf("1. Search For A Song By ID number\n");
        printf("2. Search For A Song By Title\n");
        printf("3. Search For A Song By Producer's Name\n");
        printf("4. Search For A Song By Performer's Name\n");
        printf("5. Search A Song By Writer's Name\n");
        printf("6. Return to Authorized menu\n");
        tryagain:
        scanf("%d", &option);
        switch(option)
        {
        case 1:
            SearchById();
            break;
        case 2:
            SearchByTitle();
            break;
        case 3:
            SearchByProdName();
            break;
        case 4:
            SearchByPerformName();
            break;
        case 5:
            SearchByWriterName();
            break;
        case 6:
            if(strcmp(login.title,"MANAGER")==0)
                {
                    MainMenu();
                }
                else if(strcmp(login.title,"DJ")==0)
                {
                    DjMenu();
                }
                else if(adminEntered==1)
                {
                    MainMenu();
                }
            break;

        default:
            printf("Invalid entry, Try again\n");
            goto tryagain;
            break;
        }
    }
    fclose(fsongs);
}
void SearchEmployee(void)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
    int idnum,found;
    char ans='\0';
    fpemp = fopen("employee.dat", "rb");
    if(fpemp==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        tryagain:
        printf("Enter the ID number for the employee\n");
        scanf("%d", &idnum);
        if(idnum!=0)
        {
            rewind(fpemp);
            fseek(fpemp, (idnum-1) * sizeof(EMPLOYEES), SEEK_SET);
            fread(&emp, sizeof(EMPLOYEES), 1, fpemp);
            fflush(stdin);
            if(idnum != emp.id)
            {
            	printf("RECORD WAS NOT FOUND\n");
            	tryagain2:
            	printf("Do you wish to try again? <Y or N>\n");
            	scanf(" %c", &ans);
            	if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }

            }
            else
            	{
            	    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
            	    printf("record found\n");
                    printf("Id number: %d\n", emp.id);
                    printf("First Name: %s\n", emp.fName);
                    printf("Last Name: %s\n", emp.lName);
                    printf("Password: %s\n", emp.passWord);
                    printf("Job Title: %s\n", emp.jTitle);
                    printf("Month Employed: %s\n", emp.monthEmp);
                    printf("Day of the Month Employed: %d\n", emp.dayEmp);
                    printf("Year Employed: %d\n", emp.yearEmp);
                    printf("Year of Birth: %d\n", emp.yOB);
                    fflush(stdin);
                    printf("Press any Key to return to the main menu\n");
                    getch();
                    MainMenu();
            	}
        }

    }
    fclose(fpemp);

}
void SearchRoyaltyReport(void)
{
    int idnum,found=0;
    char ans='\0';
    tryagain:
    froyalties = fopen("royalties.dat", "rb");
    if(froyalties==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
            idnum=0;
        printf("Enter the ID number for the producer\n");
        scanf("%d", &idnum);
        rewind(froyalties);
        while(fread(&royalties, sizeof(ROYALTIES), 1, froyalties)==1){
        fflush(stdin);
        if(idnum == royalties.prodID){
            printf("ROYALTY REPORT FOUND\n");
            fflush(stdin);
            printf("Producer's Id number: %d\n", royalties.prodID);
            printf("Amount to be paid over: %.2f\n", royalties.prodWallet);
            printf("Press any key to return to the main menu\n");
            getch();
            MainMenu();
            found=1;
            }
            }
            fclose(froyalties);

        if(found ==1)
        {
            printf("RECORD NOT FOUND\n");
            tryagain2:
                printf("Do you wish to try again? <Y or N>\n");
                scanf(" %c", &ans);
                if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }
        }
    }
}



void GenerateSetList(void)
{
    int endRange=0, highestGen=0;
    int ran =0, x=0;
    srand(time(NULL));

    printf("Enter the amount of songs you wish to generate for the set-list\n");
    scanf("%d", &endRange);

    songsIncrement=fopen("increment2.dat", "rb+");//GETTING THE HIGHEST/LAST ID NUMBER IN THE SONG RECORDS FOR RAND RANGE
    if(songsIncrement==NULL)
    {
        printf("Error Opening File...\n");
    }
    else
    {
        fread(&incrementVar2, sizeof(SONGINCREMENT),1, songsIncrement);
        highestGen=incrementVar2.increment2;

    }
    fclose(songsIncrement);

    fsongs=fopen("songs.dat", "rb");
    if(fsongs==NULL)
    {
        printf("Error Opening File...\n");
    }
    else
     {
        for(x=0; x<endRange; x++){
            ran=1+rand()%highestGen;
            rewind(fsongs);
            while(fread(&songs, sizeof(SONGS), 1, fsongs)==1){
            if(songs.id==ran)
               {
                   if(strcmp(songs.rating,"RAW")==0){
                   fsenior=fopen("seniors.dat", "ab");
                   if(fsenior==NULL)
                    {
                        printf("Error opening file\n");
                    }
                    else
                    {

                        senior.id=songs.id;
                        strcpy(senior.title,songs.title);
                        strcpy(senior.prodfName,songs.prodfName);
                        strcpy(senior.prodlName,songs.prodlName);
                        strcpy(senior.writerfName,songs.writerfName);
                        strcpy(senior.writerlName,songs.writerlName);
                        strcpy(senior.performerfName,songs.performerfName);
                        strcpy(senior.performerlName,songs.performerlName);
                        strcpy(senior.releaseDate,songs.releaseDate);
                        strcpy(senior.rating,songs.rating);
                        senior.dollarVal=songs.dollarVal;

                        fwrite(&senior, sizeof(SENIORS), 1, fsenior);//storing song into senior setlist
                        monthrev.monthlyRev=monthrev.monthlyRev+songs.dollarVal;
                        fmonthrev=fopen("montlyrevenu.dat","wb");
                        if(fmonthrev==NULL)
                        {
                            printf("Error opening file\n");
                        }
                        else
                        {
                            fwrite(&monthrev, sizeof(MONTHREV), 1, fmonthrev);
                        }

                        froyalties=fopen("royalties.dat", "ab");
                        if(froyalties==NULL)
                        {
                            printf("Error opening file\n");
                        }
                        else
                        {
                            royalties.prodID = songs.id;
                            int percentage= 0.05*monthrev.monthlyRev;
                            royalties.prodWallet = royalties.prodWallet+percentage+1+songs.dollarVal;
                            fwrite(&royalties, sizeof(ROYALTIES), 1, froyalties);
                        }
                        fclose(froyalties);
                    }
                    fclose(fsenior);
               }
               else if(strcmp(songs.rating,"CLEAN")==0)
               {
                        fsophomore=fopen("sophomores.dat", "ab");
                        if(fsophomore==NULL)
                            {
                                printf("Error opening file\n");
                            }
                        else
                            {

                                sophomore.id=songs.id;
                                strcpy(sophomore.title,songs.title);
                                strcpy(sophomore.prodfName,songs.prodfName);
                                strcpy(sophomore.prodlName,songs.prodlName);
                                strcpy(sophomore.writerfName,songs.writerfName);
                                strcpy(sophomore.writerlName,songs.writerlName);
                                strcpy(sophomore.performerfName,songs.performerfName);
                                strcpy(sophomore.performerlName,songs.performerlName);
                                strcpy(sophomore.releaseDate,songs.releaseDate);
                                strcpy(sophomore.rating,songs.rating);
                                sophomore.dollarVal=songs.dollarVal;
                                fwrite(&sophomore, sizeof(SOPHOMORES), 1, fsophomore);

                                monthrev.monthlyRev=monthrev.monthlyRev+songs.dollarVal;
                                fmonthrev=fopen("montlyrevenu.dat","wb");
                                if(fmonthrev==NULL)
                                    {
                                        printf("Error opening file\n");
                                    }
                                else
                                {
                                    fwrite(&monthrev, sizeof(MONTHREV), 1, fmonthrev);
                                }

                                froyalties=fopen("royalties.dat", "ab");
                                if(froyalties==NULL)
                                    {
                                        printf("Error opening file\n");
                                    }
                                else
                                    {
                                        royalties.prodID = songs.id;
                                        int percentage= 0.01*monthrev.monthlyRev;
                                        royalties.prodWallet = royalties.prodWallet+percentage+1+songs.dollarVal;
                                        fwrite(&royalties, sizeof(ROYALTIES), 1, froyalties);
                                    }
                                    fclose(froyalties);
                            }

                        fjunior=fopen("juniors.dat", "ab");
                        if(fjunior==NULL)
                            {
                                printf("Error Opening file\n");
                            }
                        else
                            {
                                junior.id=songs.id;
                                strcpy(junior.title,songs.title);
                                strcpy(junior.prodfName,songs.prodfName);
                                strcpy(junior.prodlName,songs.prodlName);
                                strcpy(junior.writerfName,songs.writerfName);
                                strcpy(junior.writerlName,songs.writerlName);
                                strcpy(junior.performerfName,songs.performerfName);
                                strcpy(junior.performerlName,songs.performerlName);
                                strcpy(junior.releaseDate,songs.releaseDate);
                                strcpy(junior.rating,songs.rating);
                                junior.dollarVal=songs.dollarVal;

                                fwrite(&junior, sizeof(JUNIORS), 1, fjunior);

                                monthrev.monthlyRev=monthrev.monthlyRev+songs.dollarVal;
                                fmonthrev=fopen("montlyrevenu.dat","wb");
                                if(fmonthrev==NULL)
                                {
                                    printf("Error opening file\n");
                                }
                                else
                                    {
                                        fwrite(&monthrev, sizeof(MONTHREV), 1, fmonthrev);
                                    }

                                    froyalties=fopen("royalties.dat", "ab");

                                if(froyalties==NULL)
                                    {
                                        printf("Error opening file\n");
                                    }
                                else
                                    {
                                        royalties.prodID = songs.id;
                                        int percentage= 0.03*monthrev.monthlyRev;
                                        royalties.prodWallet = royalties.prodWallet+percentage+1+songs.dollarVal;
                                        fwrite(&royalties, sizeof(ROYALTIES), 1, froyalties);
                                    }
                                    fclose(froyalties);
                            }
                            fclose(fjunior);
                            fclose(fsophomore);
               }
        }
            }//while loop ends here
        } //for loop ends here
     }
    fclose(fsongs);
    fclose(fmonthrev);
    InitiateSetList();
}

void InitiateSetList(void)
{
    time_t t = time(NULL);
    struct tm tm = *localtime(&t);
       if(tm.tm_hour >= 6 && tm.tm_hour <=14 )
       {
           SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
           printf("We are now on Sophomore time\n");
           printf("These songs are selected from the global set-list \n");

           fsophomore=fopen("sophomores.dat", "rb");
                        if(fsophomore==NULL)
                            {
                                printf("There were no sophomore songs in the randomly generated set-list\n");
                            }
                        else
                            {
                                while(fread(&sophomore, sizeof(SOPHOMORES), 1, fsophomore)==1);
                                {
                                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                                    fflush(stdin);
                                    printf("Id number: %d\n", sophomore.id);
                                    printf("Title: %s\n", sophomore.title);
                                    printf("Producer's First Name: %s\n", sophomore.prodfName);
                                    printf("Producer's Last Name: %s\n", sophomore.prodlName);
                                    printf("Writer's First Name %s\n", sophomore.writerfName);
                                    printf("Writer's Last Name: %s\n", sophomore.writerlName);
                                    printf("Performer's First Name: %s\n", sophomore.performerfName);
                                    printf("Performer's Last Name: %s\n", sophomore.performerlName);
                                    printf("Release Date: %s\n", sophomore.releaseDate);
                                    printf("Rating: %s\n", sophomore.rating);
                                    printf("Cost of song %.2f\n", sophomore.dollarVal);
                                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
                                    printf("===================================\n");
                                }
                            }
                            fclose(fsophomore);
       }
       else if(tm.tm_hour >= 14 && tm.tm_hour<=22 )
       {
           printf("We are now on Junior time\n");
           printf("These songs are selected from the global set-list \n");
           int count=0;
           fjunior=fopen("juniors.dat", "rb");
                        if(fjunior==NULL)
                            {
                                printf("There were no Junior songs in the randomly generated set-list\n");
                            }
                        else
                            {
                                rewind(fjunior);
                                while(fread(&junior, sizeof(JUNIORS), 1, fjunior)==1){
                                    fflush(stdin);
                                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                                    printf("Id number: %d\n", junior.id);
                                    printf("Title: %s\n", junior.title);
                                    printf("Producer's First Name: %s\n", junior.prodfName);
                                    printf("Producer's Last Name: %s\n", junior.prodlName);
                                    printf("Writer's First Name %s\n", junior.writerfName);
                                    printf("Writer's Last Name: %s\n", junior.writerlName);
                                    printf("Performer's First Name: %s\n", junior.performerfName);
                                    printf("Performer's Last Name: %s\n", junior.performerlName);
                                    printf("Release Date: %s\n", junior.releaseDate);
                                    printf("Rating: %s\n", junior.rating);
                                    printf("Cost of song %.2f\n", junior.dollarVal);
                                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
                                    printf("===================================\n");
                                    count++;
                                }
                            }
                            fclose(fjunior);
       }
       else
       {
           printf("We are now on Senior Time\n");
           printf("These songs are selected from the global set-list \n\n");
           fsenior=fopen("seniors.dat", "rb");
           if(fsenior==NULL)
                    {
                        printf("There were no Senior songs in the randomly generated set-list\n");
                    }
                    else
                    {
                                while(fread(&senior, sizeof(SENIORS), 1, fsenior)==1);
                                {
                                    fflush(stdin);
                                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                                    printf("Id number: %d\n", senior.id);
                                    printf("Title: %s\n", senior.title);
                                    printf("Producer's First Name: %s\n", senior.prodfName);
                                    printf("Producer's Last Name: %s\n", senior.prodlName);
                                    printf("Writer's First Name %s\n", senior.writerfName);
                                    printf("Writer's Last Name: %s\n", senior.writerlName);
                                    printf("Performer's First Name: %s\n", senior.performerfName);
                                    printf("Performer's Last Name: %s\n", senior.performerlName);
                                    printf("Release Date: %s\n", senior.releaseDate);
                                    printf("Rating: %s\n", senior.rating);
                                    printf("Cost of song %.2f\n", senior.dollarVal);
                                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                                    printf("===================================\n");
                                }
                    }
                    fclose(fsenior);
       }
       printf("Press any key to return to the Authorized menu\n");
       getch();
       if(strcmp(login.title,"MANAGER")==0)
                {
                    MainMenu();
                }
                else if(strcmp(login.title,"DJ")==0)
                {
                    DjMenu();
                }
                else if(adminEntered==1)
                {
                    MainMenu();
                }
}

void CheckDay(void)
{
    if(!(emp.dayEmp>=1 && emp.dayEmp<=31))
        {
            printf("Invalid day entered\n");
            InvalidDay=1;
        }
}

void CheckTitle(void)
{
    if(!(strcmp(emp.jTitle,"DJ")==0 || strcmp(emp.jTitle,"MANAGER")==0))
    {
        printf("Invalid position entered\n");
        InvalidJobTitle=1;
    }

}


void printAllEmpRec(void)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
    int empCount=0;
    fpemp = fopen("employee.dat", "rb");
    if(fpemp==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        rewind(fpemp);
        while(fread(&emp, sizeof(EMPLOYEES), 1, fpemp)==1)
            {
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
                fflush(stdin);
                printf("Id number: %d\n", emp.id);
                printf("First Name: %s\n", emp.fName);
                printf("Last Name: %s\n", emp.lName);
                printf("Password: %s\n", emp.passWord);
                printf("Job Title: %s\n", emp.jTitle);
                printf("Month Employed: %s\n", emp.monthEmp);
                printf("Day of the Month Employed: %d\n", emp.dayEmp);
                printf("Year Employed: %d\n", emp.yearEmp);
                printf("Year of Birth: %d\n", emp.yOB);
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                printf("===================================\n");
                empCount++;
            }
    }
    fclose(fpemp);
    printf("The number of employees present is %d\n", empCount);
    printf("Press any key to return to the main menu\n");
    getch();
    MainMenu();
}

void CheckAvailableId(void)
{
    int exist = 0;
    empIncrement=fopen("increment.dat", "rb+");
    if(empIncrement==NULL)
    {
        incrementVar.increment++;
        emp.id=incrementVar.increment;
        empIncrement=fopen("increment.dat", "wb+");
        if(empIncrement==NULL)
            {
                printf("Error writing incremented value to file\n");;
            }
            else
            {
                fwrite(&incrementVar, sizeof(EMPINCREMENT), 1, empIncrement);
            }
            fclose(empIncrement);
    }
    else
    {
        rewind(empIncrement);
        fread(&incrementVar, sizeof(EMPINCREMENT), 1, empIncrement);
        incrementVar.increment++;
        emp.id = incrementVar.increment;
        rewind(empIncrement);
        if(fwrite(&incrementVar, sizeof(EMPINCREMENT), 1, empIncrement)!=1)
        {
            printf("Error writing to file\n");
        }
        fclose(empIncrement);
    }
    fclose(empIncrement);
}

void ValidateLogin(void)
{
    int idnum,checker =0,count=0;
    char pass[SIZE];

    DisplayLogo();
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 13);
    printf("\t\t\tWELCOME TO THE LOGIN SCREEN!\n\n\n");
    printf("LOGIN WILL BE MADE WITH ID NUMBER AND PASSWORD OF THE USER\n");
    printf("THREE(3) INVALID ENTRIES WILL RESULT IN A LOCKOUT!\n\n");
    printf("YOU MAY NOW LOGIN WHETHER ADMIN OR EMPLOYEE\n\n");
    fLogin=fopen("login.dat", "rb");
    if(fLogin==NULL)
    {
        printf("Error opening file\n");
    }
    else
    {
        while(count<=2)
        {
            printf("Enter your ID number\n");
            scanf("%d", &idnum);
            printf("Enter your password\n");
            scanf("%s", pass);
            strupr(pass);

            AdminLogin();//CREATING ADMIN LOGIN CREDENTIALS WHICH ARE HARDCODED IN THE ADMIN STRUCTURE ABOVE
            alogin=fopen("Admins_Login.txt", "r");
            if(alogin==NULL)
            {
                printf("Error Opening file\n");
            }
            else
            {
                fscanf(alogin,"%d\n%s",&admins.id,admins.password);
                if(idnum==admins.id && (strcmp(pass,admins.password)==0))
                {
                    printf("Access Granted. Welcome Administrator!\n");
                    adminEntered=1;
                    fclose(alogin);
                    printf("Press any key to proceed to the main menu\n");
                    getch();
                    system("cls");
                    DisplayLogo();
                    MainMenu();
                }
            }

            while(fread(&login, sizeof(Login),1, fLogin)==1)
            {
                if(idnum==login.id && (strcmp(pass,login.passWord)==0))
                    {
                        checker=1;
                        if(strcmp(login.title,"MANAGER")==0)
                            {
                                printf("Access Granted...You are a MANAGER\n");
                                printf("Press any key to proceed to the MANAGER menu\n");
                                getch();
                                fclose(fLogin);
                                system("cls");
                                DisplayLogo();
                                MainMenu();
                            }
                        else
                            {
                                printf("Access Granted...You are a DJ\n");
                                printf("Press any key to proceed to the DJ menu\n");
                                getch();
                                fclose(fLogin);
                                system("cls");
                                DisplayLogo();
                                DjMenu();
                            }
                    }
            }
            if(!(checker==1))
                {
                    printf("\nInvalid Login Credentials\n\n");
                }
                count++;
            if(count==3)
            {
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                printf("You are now locked out\n");
                printf("Press any key to exit\n");
                fclose(fLogin);
                getch();
                exit(0);
            }
        }
    }
}

void AddProducer(void)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 13);
    printf("===============================================\n");
    printf("Please Add The Rest Of Producer's Information Below\n");
    printf("This process has to take place once a song is added\n\n");
    fproducers=fopen("producers.dat","ab");
    if(fproducers==NULL)
    {
        printf("Error opening file\n");
    }
    else
    {
        producers.id=songs.id;
        strcpy(producers.prodfName,songs.prodfName);
        strcpy(producers.prodlName,songs.prodlName);
        printf("Enter the producer's company name(without spaces)\n");
        scanf("%s", producers.prodCompany);
        printf("Enter the producer's email address\n");
        scanf("%s", producers.prodEmail);
        printf("Enter the producer's telephone number\n");
        scanf("%s", producers.prodTele);
        fwrite(&producers, sizeof(PRODUCERS),1, fproducers);
    }
    fclose(fproducers);

           printf("Please Hold, Creating Producer Memory...");
            Sleep(1000);
            system("cls");
            printf("Accepting Data....");
            Sleep(50);
            system("cls");
            printf("Enabling Data De-Fragmentation.....");
            Sleep(50);
            system("cls");
            printf("Organizing File Memory...");
            Sleep(50);
            system("cls");
            printf("Initiating Data Logs...");
            Sleep(50);
            system("cls");
            printf("Data Checking...");
            Sleep(50);
            system("cls");
            printf("Initializing Validity Check...");
            Sleep(50);
            system("cls");
            printf("Locating Record Addresses..");
            Sleep(50);
            system("cls");
            printf("Initiating Data Storage...");
            Sleep(50);
            system("cls");
            printf("Please wait, Finalizing DataBase Entry...");
            Sleep(2000);
            system("cls");

    printf("Successfully added Producer to Records!\n");
    printf("Press any key to return to the main menu\n");
    getch();
    MainMenu();
}

void CheckAvailableId2(void)
{
    songsIncrement=fopen("increment2.dat", "rb+");
    if(songsIncrement==NULL)
    {
        incrementVar2.increment2++;
        songs.id=incrementVar2.increment2;
        songsIncrement=fopen("increment2.dat", "wb+");
        if(songsIncrement==NULL)
            {
                printf("Error writing incremented value to file\n");;
            }
            else
            {
                fwrite(&incrementVar2, sizeof(SONGINCREMENT), 1, songsIncrement);
            }
            fclose(songsIncrement);
    }
    else
    {
        rewind(songsIncrement);
        fread(&incrementVar2, sizeof(SONGINCREMENT), 1, songsIncrement);
        incrementVar2.increment2++;
        songs.id = incrementVar2.increment2;
        rewind(songsIncrement);
        if(fwrite(&incrementVar2, sizeof(SONGINCREMENT), 1, songsIncrement)!=1)
        {
            printf("Error writing to file\n");
        }
        fclose(songsIncrement);
    }
    fclose(songsIncrement);
}


void CheckRating(void)
{

    if(!(strcmp(songs.rating,"RAW")==0 || strcmp(songs.rating,"CLEAN")==0))
    {
        InvalidRating=1;
        printf("Invalid rating entered\n");
    }
}



void printAllSongs(void)
{
    int songCount=0;
    fsongs = fopen("songs.dat", "rb");
    if(fsongs==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        rewind(fsongs);
        while(fread(&songs, sizeof(SONGS), 1, fsongs)==1)
            {
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
                fflush(stdin);
                printf("Id number: %d\n", songs.id);
                printf("Title: %s\n", songs.title);
                printf("Producer's First Name: %s\n", songs.prodfName);
                printf("Producer's Last Name: %s\n", songs.prodlName);
                printf("Writer's First Name %s\n", songs.writerfName);
                printf("Writer's Last Name: %s\n", songs.writerlName);
                printf("Performer's First Name: %s\n", songs.performerfName);
                printf("Performer's Last Name: %s\n", songs.performerlName);
                printf("Release Date: %s\n", songs.releaseDate);
                printf("Rating: %s\n", songs.rating);
                printf("Cost of song %.2f\n", songs.dollarVal);
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                printf("===================================\n");
                songCount++;
            }
    }
    fclose(fsongs);
    printf("The number of songs in the vault is %d\n", songCount);
    printf("Press any key to return to the main menu\n");
    getch();
    MainMenu();
}

void printAllProducers()
{
    int prodCount=0;
        fproducers = fopen("producers.dat", "rb");
    if(fproducers==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        rewind(fproducers);
        while(fread(&producers, sizeof(PRODUCERS), 1, fproducers)==1)
            {
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
                fflush(stdin);
                printf("Producer's Id number: %d\n", producers.id);
                printf("Producer's First Name: %s\n", producers.prodfName);
                printf("Producer's Last Name: %s\n", producers.prodlName);
                printf("Producer's Company Name: %s\n", producers.prodCompany);
                printf("Producer's Email Address: %s\n", producers.prodEmail);
                printf("Producer's Telephone Number: %s\n",producers.prodTele);
                SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                printf("===================================\n");
                prodCount++;
            }
    }
    fclose(fproducers);
    printf("The number of producers present is %d\n", prodCount);
    printf("Press any key to return to the main menu\n");
    getch();
    MainMenu();
}

void SearchProducer(void)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
    int idnum,found;
    char ans='\0';
    fproducers = fopen("producers.dat", "rb");
    if(fproducers==NULL)
    {
        printf("Error opening file...\n");
    }
    else
    {
        tryagain:
        printf("Enter the ID number for the Producer\n");
        scanf("%d", &idnum);
        if(idnum!=0)
        {
            rewind(fproducers);
            fseek(fproducers, (idnum-1) * sizeof(PRODUCERS), SEEK_SET);
            fread(&producers, sizeof(PRODUCERS), 1, fproducers);
            fflush(stdin);
            if(idnum != producers.id){
                printf("RECORD WAS NOT FOUND\n");
                tryagain2:
                printf("Do you wish to try again? <Y or N>\n");
                scanf(" %c", &ans);
                if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }

            }
            else
                {
                    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
                    fflush(stdin);
                    printf("Producer's Id number: %d\n", producers.id);
                    printf("Producer's First Name: %s\n", producers.prodfName);
                    printf("Producer's Last Name: %s\n", producers.prodlName);
                    printf("Producer's Company Name: %s\n", producers.prodCompany);
                    printf("Producer's Email Address: %s\n", producers.prodEmail);
                    printf("Producer's Telephone Number: %s\n",producers.prodTele);
                    printf("===================================\n");

                }
        }

    }
    fclose(fproducers);
    printf("Press any key to return to the main menu\n");
    getch();
    MainMenu();
}

void CheckValue(void)
{
  if(strcmp(songs.rating,"RAW")==0)
  {
      if(!(songs.dollarVal >= 8.00 && songs.dollarVal <=11.00))
      {
          printf("Invalid value entered\n");
          InvalidDollarVal=1;
      }
  }
  else
  {
      if(!(songs.dollarVal >=2.99 && songs.dollarVal <= 7.99 ))
      {
          printf("Invalid value entered\n");
          InvalidDollarVal=1;
      }
  }
}


void SearchById(void)
{
    int idnum;
    char ans ='\0';
    tryagain:
    printf("Enter the ID number for the song\n");
    scanf("%d", &idnum);
    if(idnum!=0)
        {
            rewind(fsongs);
            fseek(fsongs, (idnum-1) * sizeof(SONGS), SEEK_SET);
            fread(&songs, sizeof(SONGS), 1, fsongs);
            fflush(stdin);
            if(idnum != songs.id){
            	printf("RECORD WAS NOT FOUND\n");
                tryagain2:
            	printf("Do you wish to try again? <Y or N>\n");
            	scanf(" %c", &ans);
            	if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }
            }
            else
            	{
            	    printf("Id number: %d\n", songs.id);
                    printf("Title: %s\n", songs.title);
                    printf("Producer's First Name: %s\n", songs.prodfName);
                    printf("Producer's Last Name: %s\n", songs.prodlName);
                    printf("Writer's First Name %s\n", songs.writerfName);
                    printf("Writer's Last Name: %s\n", songs.writerlName);
                    printf("Performer's First Name: %s\n", songs.performerfName);
                    printf("Performer's Last Name: %s\n", songs.performerlName);
                    printf("Release Date: %s\n", songs.releaseDate);
                    printf("Rating: %s\n", songs.rating);
                    printf("Cost of song %.2f\n", songs.dollarVal);
                    printf("===================================\n");
                    fflush(stdin);
            	}
        }
        printf("Press any key to return to the main menu...\n");
        getch();
        MainMenu();
}
void SearchByTitle(void)
{
    char title[SIZE], ans='\0';
    int found=0;

    tryagain:
    printf("Enter the title of the song\n");
    scanf("%s",title);
    strupr(title);

            rewind(fsongs);
            while(fread(&songs, sizeof(SONGS), 1, fsongs)==1){
            fflush(stdin);
            if(strcmp(songs.title,title)==0){
                    printf("Id number: %d\n", songs.id);
                    printf("Title: %s\n", songs.title);
                    printf("Producer's First Name: %s\n", songs.prodfName);
                    printf("Producer's Last Name: %s\n", songs.prodlName);
                    printf("Writer's First Name %s\n", songs.writerfName);
                    printf("Writer's Last Name: %s\n", songs.writerlName);
                    printf("Performer's First Name: %s\n", songs.performerfName);
                    printf("Performer's Last Name: %s\n", songs.performerlName);
                    printf("Release Date: %s\n", songs.releaseDate);
                    printf("Rating: %s\n", songs.rating);
                    printf("Cost of song %.2f\n", songs.dollarVal);
                    printf("===================================\n");
                    fflush(stdin);
                    found=1;
            	}
            }
            if(found!=1)
            {
                printf("The record was not found\n");
                tryagain2:
            	printf("Do you wish to try again? <Y or N>\n");
            	scanf(" %c", &ans);
            	if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }
            }
        printf("Press any key to return to the main menu...\n");
        getch();
        MainMenu();
}
void SearchByProdName(void)
{
    char fName[SIZE];
    char lName[SIZE], ans='\0';
    int found=0;

    tryagain:
    printf("Enter the producer's first name\n");
    scanf("%s",fName);
    strupr(fName);

    printf("Enter the producer's last name\n");
    scanf("%s",lName);
    strupr(lName);

            rewind(fsongs);
            while(fread(&songs, sizeof(SONGS), 1, fsongs)==1){
            fflush(stdin);
             if((strcmp(songs.prodfName, fName)==0) && (strcmp(songs.prodlName, lName)==0)){
                    printf("Id number: %d\n", songs.id);
                    printf("Title: %s\n", songs.title);
                    printf("Producer's First Name: %s\n", songs.prodfName);
                    printf("Producer's Last Name: %s\n", songs.prodlName);
                    printf("Writer's First Name %s\n", songs.writerfName);
                    printf("Writer's Last Name: %s\n", songs.writerlName);
                    printf("Performer's First Name: %s\n", songs.performerfName);
                    printf("Performer's Last Name: %s\n", songs.performerlName);
                    printf("Release Date: %s\n", songs.releaseDate);
                    printf("Rating: %s\n", songs.rating);
                    printf("Cost of song %.2f\n", songs.dollarVal);
                    printf("===================================\n");
                    fflush(stdin);
                    found=1;
            	}
            }
            if(found!=1)
            {
                printf("The record was not found\n");
                tryagain2:
            	printf("Do you wish to try again? <Y or N>\n");
            	scanf(" %c", &ans);
            	if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }
            }
        printf("Press any key to return to the main menu...\n");
        getch();
        MainMenu();
}
void SearchByPerformName(void)
{
    char fName[SIZE];
    char lName[SIZE], ans='\0';
    int found=0;

    tryagain:
    printf("Enter the performer's first name\n");
    scanf("%s",fName);
    strupr(fName);

    printf("Enter the performer's last name\n");
    scanf("%s",lName);
    strupr(lName);

            rewind(fsongs);
            while(fread(&songs, sizeof(SONGS), 1, fsongs)==1){
            fflush(stdin);
             if((strcmp(songs.performerfName, fName)==0) && (strcmp(songs.performerlName, lName)==0)){
                    printf("Id number: %d\n", songs.id);
                    printf("Title: %s\n", songs.title);
                    printf("Producer's First Name: %s\n", songs.prodfName);
                    printf("Producer's Last Name: %s\n", songs.prodlName);
                    printf("Writer's First Name %s\n", songs.writerfName);
                    printf("Writer's Last Name: %s\n", songs.writerlName);
                    printf("Performer's First Name: %s\n", songs.performerfName);
                    printf("Performer's Last Name: %s\n", songs.performerlName);
                    printf("Release Date: %s\n", songs.releaseDate);
                    printf("Rating: %s\n", songs.rating);
                    printf("Cost of song %.2f\n", songs.dollarVal);
                    printf("===================================\n");
                    fflush(stdin);
                    found=1;
            	}
            }
            if(found!=1)
            {
                printf("The record was not found\n");
                tryagain2:
            	printf("Do you wish to try again? <Y or N>\n");
            	scanf(" %c", &ans);
            	if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }
            }
    printf("Press any key to return to the main menu...\n");
    getch();
    MainMenu();
}
void SearchByWriterName(void)
{
    char fName[SIZE];
    char lName[SIZE], ans='\0';
    int found=0;

    tryagain:
    printf("Enter the writer's first name\n");
    scanf("%s",fName);
    strupr(fName);

    printf("Enter the writer's last name\n");
    scanf("%s",lName);
    strupr(lName);

            rewind(fsongs);
            while(fread(&songs, sizeof(SONGS), 1, fsongs)==1){
            fflush(stdin);
             if((strcmp(songs.writerfName, fName)==0) && (strcmp(songs.writerlName, lName)==0)){
                    printf("Id number: %d\n", songs.id);
                    printf("Title: %s\n", songs.title);
                    printf("Producer's First Name: %s\n", songs.prodfName);
                    printf("Producer's Last Name: %s\n", songs.prodlName);
                    printf("Writer's First Name %s\n", songs.writerfName);
                    printf("Writer's Last Name: %s\n", songs.writerlName);
                    printf("Performer's First Name: %s\n", songs.performerfName);
                    printf("Performer's Last Name: %s\n", songs.performerlName);
                    printf("Release Date: %s\n", songs.releaseDate);
                    printf("Rating: %s\n", songs.rating);
                    printf("Cost of song %.2f\n", songs.dollarVal);
                    printf("===================================\n");
                    fflush(stdin);
                    found=1;
            	}
            }
            if(found!=1)
            {
                tryagain2:
            	printf("Do you wish to try again? <Y or N>\n");
            	scanf(" %c", &ans);
            	if(ans== 'Y' || ans == 'y')
                {
                    goto tryagain;
                }
                else if(ans== 'N' || ans == 'n')
                {
                    MainMenu();
                }
                else
                {
                    printf("Invalid entry\n");
                    goto tryagain2;
                }
            }
        printf("Press any key to return to the main menu...\n");
        getch();
        MainMenu();
}

void AdminLogin(void)
{
    alogin=fopen("Admins_Login.txt", "w");
    if(alogin==NULL)
    {
        printf("Error opening admins login file\n");
    }
    else
    {
        fprintf(alogin,"%d\n%s", admins.id,admins.password);
    }
    fclose(alogin);
}


void MainMenu(void)
{
   system("cls");
   DisplayLogo();

   printf("\t                ===========================\n\t");
   printf("                @@@@@@@@ MAIN MENU @@@@@@@@\n\t");
   printf("                ===========================");

   SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 13); //APPLYING COLOUR TO OUTPUT
   printf("\n\n\t\t   || A. Add Song To Vault             ||\n\t");
   printf(" \t   || B. Add Employee To Records       ||\n\t");
   printf(" \t   || C. Update A Song                 ||\n\t");
   printf(" \t   || D. Update An Employee            ||\n\t");
   printf(" \t   || E. Search For A Song             ||\n\t");
   printf(" \t   || F. Search For A Producer         ||\n\t");
   printf(" \t   || G. Search For An Employee        ||\n\t");
   printf(" \t   || H. Search For A Royalty Report   ||\n\t");
   printf(" \t   || I. Generate Set-List             ||\n\t");
   printf(" \t   || J. Display All Employees Records ||\n\t");
   printf(" \t   || K. Display All Songs In Vault    ||\n\t");
   printf(" \t   || L. Display All Producers Records ||\n\t");
   printf(" \t   || M. Exit                          ||\n\n\t");

   char activity_selection;
printf("Enter the letter that corresponds with each option\n");
scanf("%s",&activity_selection);
system("cls");
    switch(activity_selection) //SWITCH STATEMENT OF THE ACTIVITIES TO BE SELECTED FROM
    {

       case 'A': case'a':
       AddSong();
       break;

       case 'B': case 'b':
       AddEmployee();
       break;

       case 'C': case 'c':
       UpdateSong();
       break;

       case 'D': case 'd':
       UpdateEmployee();
       break;

       case 'E': case 'e':
       SearchSong();
       break;

       case 'F': case 'f':
           SearchProducer();
       break;

       case 'G': case 'g':
        SearchEmployee();
       break;

       case 'H': case 'h':
       SearchRoyaltyReport();
       break;

       case 'I': case 'i':
       GenerateSetList();
       break;

       case 'J': case 'j':
       printAllEmpRec();
       break;

       case 'K': case 'k':
       printAllSongs();
       break;

       case 'L': case 'l':
       printAllProducers();
       break;

       case 'M': case 'm':
       exit(0);
       break;


       default :
       system("cls");
       printf("The choice you entered appears to be invalid\n");
       printf("Press enter to return to the main menu");
       getch();
       MainMenu();
       break;
   }


}
void DjMenu(void)
{
    system("cls");
    DisplayLogo();

    printf("\t            ===========================\n\t");
    printf("            @@@@@@@@ DJ MENU @@@@@@@@\n\t");
    printf("            ===========================");

    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 13); //APPLYING COLOUR TO OUTPUT
    printf("\n\n\t || A. Search For A Song     -(Preferably for new users) ||\n\t");
    printf(" || B. Generate Set-List        -(for members only)         ||\n\t");
    printf(" || C. Exit     -(for members only)         ||\n\t");

    char activity_selection;
    printf("Enter the letter that corresponds with each option\n");
    scanf("%s",&activity_selection);
    system("cls");
    switch(activity_selection) //SWITCH STATEMENT OF THE ACTIVITIES TO BE SELECTED FROM
    {

       case 'A': case'a':
       SearchSong();
       break;

       case 'B': case 'b':
       GenerateSetList();
       break;

       case 'C': case 'c':
       exit(0);
       break;

       default :
       system("cls");
       printf("The choice you entered appears to be invalid\n");
       printf("Press enter to return to the DJ menu\n");
       getch();
       DjMenu();
       break;
    }
}

void DisplayLogo(void)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE), 10);
    printf("\t     ===================================================         \n\t");
	printf("     @@@@@@@@@@      Plug & Play 103 FM    @@@@@@@@@@@@@           \n\t");
	printf("     @@@@@@@@@@      Radio Station LIVE    @@@@@@@@@@@@@           \n\t");
	printf("     @@@@@@@@@@       Kingston Jamaica     @@@@@@@@@@@@@           \n\t");
    printf("     ===================================================           \n\n");
}
