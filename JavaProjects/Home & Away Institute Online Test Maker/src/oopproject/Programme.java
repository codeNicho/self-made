package oopproject;

public class Programme {
	private String Code;
	private String Name;
	private int maxNumCourse;
	private String Award;
	private String Accredited;
	private Course course = new Course();
	
	public Programme(){
		Code = "";
		Name = "";
		maxNumCourse = 0;
		Award = "";
		Accredited = "";
	}

	public String getCode() {
		return Code;
	}

	public void setCode(String code) {
		Code = code;
	}

	public String getName() {
		return Name;
	}

	public void setName(String name) {
		Name = name;
	}

	public int getMaxNumCourse() {
		return maxNumCourse;
	}

	public void setMaxNumCourse(int maxNumCourse) {
		this.maxNumCourse = maxNumCourse;
	}

	public String getAward() {
		return Award;
	}

	public void setAward(String award) {
		Award = award;
	}

	public String getAccredited() {
		return Accredited;
	}

	public void setAccredited(String accredited) {
		Accredited = accredited;
	}
	
	
}
