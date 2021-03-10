package oopproject;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.util.InputMismatchException;
import java.util.Scanner;

public class User {
	protected int Id;
	protected String Password;



	public User(){
		Id = 0;
		Password = "";
	}

	public int getId() {
		return Id;
	}

	public void setId(int id) {
		Id = id;
	}
	public String getPassword() {
		return Password;
	}
	public void setPassword(String password) {
		Password = password;
	}
	
	public void printMessage(){//method used to demonstrate polymorphism, overriding and overloading between User, Staff and Student Class
		System.out.println("We are inside the user Section");
	}
	public void validateCredentials(){ //  Utility method used to allow and deny access to the system
		String adminPass = "1234";
		int adminID = 1234;
		try{
			FileWriter adminobj = new FileWriter("adminrecord.txt", true); //writing th admin loging info to a file
			adminobj.write(adminID);
			adminobj.write(adminPass);
		}catch(IOException y){
			System.err.println("File could not be opened");
		}

		Scanner loginscanner = new Scanner(System.in);

		System.out.println("Welcome to the The Home & Away Institute (H&AI) Online Test System");
		System.out.println("LOGIN WILL BE MADE WITH ID NUMBER AND PASSWORD OF THE USER");
		System.out.println("YOU MAY NOW LOGIN WHETHER ADMIN, STAFF OR STUDENT\n");

		for(int x=0; x<3; x++){ //All users get three incorrect logn attempts before they are locked out of the system
			System.out.println("Enter your Id number");
			int loginid = loginscanner.nextInt();
			System.out.println("Enter your password");
			String loginpassword = loginscanner.next();
			int staffLoggedIn =0;
			int studLoggedIn = 0;

			if(loginid==adminID && loginpassword.equals(adminPass)){
				adminMenu();//calling the admin menu method if an admin logs in
			}else{
				try{
					Scanner checkstudentfile = new Scanner(new File("studentrecord.txt"));//scanning the student records to see if the credentials exist
					while(checkstudentfile.hasNext()){
						int studId = checkstudentfile.nextInt();
						String studPassword = checkstudentfile.next();
						String studFName = checkstudentfile.next();
						String studLName = checkstudentfile.next();
						int studDayEnrolled = checkstudentfile.nextInt();
						int studMonthEnrolled = checkstudentfile.nextInt();
						int studYearEnrolled = checkstudentfile.nextInt();
						String studAddress = checkstudentfile.next();
						String studEnrollStatus = checkstudentfile.next();
						String programmeEnroll = checkstudentfile.next();
						DriverClass.STUDENTID =  studId;
						if(loginid == studId && loginpassword.equals(studPassword)){
							System.out.println("You are a student");
							mainMenu();
							studLoggedIn = 1; //variable used to test later on if a student is logged in
						}
					}
						}catch(FileNotFoundException k){
							System.err.println("File cannot be opened");
						}
					if(studLoggedIn != 1){
						try{
							Scanner checkStaffFile = new Scanner(new File("staffrecord.txt"));//scanning the staff records to see if the credentials exist
							while(checkStaffFile.hasNext()){
								int staffId = checkStaffFile.nextInt();
								String staffPassword = checkStaffFile.next();
								String staffFName = checkStaffFile.next();
								String staffLName = checkStaffFile.next();
								String staffFaculty = checkStaffFile.next();
								String staffDepartment = checkStaffFile.next();
								int staffDayEmp = checkStaffFile.nextInt();
								int staffMonthEmp = checkStaffFile.nextInt();
								int staffYearEmp = checkStaffFile.nextInt();
								DriverClass.STAFFID =  staffId;
								if(loginid == staffId && loginpassword.equals(staffPassword))
								{
									System.out.println("You are a staff member");
									mainMenu();
									staffLoggedIn = 1;
								}
							}
					
				}catch(FileNotFoundException u){
					System.err.println("File was not found");
				}
					}
					if(studLoggedIn !=1 && staffLoggedIn !=1){
						System.out.println("Invalid Login Credentials Entered");
					}
		}
		}
			System.out.println("You have made 3 incorrect attempts, you care now locked out");
			System.out.print("press any key to end program");
			try{
				System.in.read();
			}catch(IOException h){
				System.err.println("System error");
			}
			System.exit(0);
	}

	public void mainMenuListOnly(){
		System.out.println("1. View Test Results");
		System.out.println("2. Take Test(Student Only)");
		System.out.println("3. Set Test(Staff Only)");
		System.out.println("4. Exit System");
	}
	
	public void viewTestResults(){
		
	}
	
	
	public void mainMenu(){
		mainMenuListOnly();
		int option = 0;
		Staff staffobj = new Staff();
		Student studentobj = new Student();
		User obj; //Creating an object of the parent class to demonstrate polymorphism
		Scanner option1scanner = new Scanner(System.in);
		while(true){
			System.out.println("Enter the number that corresponds to your desired task");
			option = option1scanner.nextInt();
			switch(option){
			case 1: if(DriverClass.STAFFID !=0){
			   obj = new Staff(); //Polymorphism takes place here 
			   obj.printMessage();// 
				staffobj.viewTestResults();
			}else{
				obj = new Student(); //Polymorphism takes place here 
			    obj.printMessage();
				studentobj.viewTestResults();
			}	
			break;

			case 2: studentobj.takeTest();
			break;

			case 3: staffobj.setTest();
			break;

			case 4: System.exit(0);
			break;

			default: System.out.println("Invalid entry");
			}

			mainMenuListOnly();
		}
	}

	public void adminListOnlyMenu(){
		System.out.println("Admins can utilize the system in the following ways");
		System.out.println("1. Add A Student Record");
		System.out.println("2. Add A Staff Record");
		System.out.println("3. Add A Programme And Courses Record");
		System.out.println("4. Exit System");
	}
	public void adminMenu(){
		int option=0;
		adminListOnlyMenu();

		DriverClass studobj = new DriverClass();
		DriverClass staffobj = new DriverClass();
		DriverClass programmeobj = new DriverClass();
		DriverClass courseobj = new DriverClass();
		Scanner optionscanner = new Scanner(System.in);
		while(true){
			System.out.println("Enter the number that corresponds to your desired task");
			option = optionscanner.nextInt();

			switch(option){
			case 1: studobj.addStudent();
			break;

			case 2: staffobj.addStaff();
			break;

			case 3: programmeobj.addProgramme();
			break;

			case 4: System.exit(0);

			default: System.out.println("Invalid Entry");
			break;
			}
			adminListOnlyMenu();
		}
	}


}
